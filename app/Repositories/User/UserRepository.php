<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Repositories\UserProfile\UserProfileRepository;
use App\Traits\UserBanTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role as ModelsRole;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    use UserBanTrait;

    public $userProfileRepo;

    function __construct(UserProfileRepository $userProfileRepo)
    {
        $this->userProfileRepo = $userProfileRepo;
    }

    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getListUsers($request)
    {
        $users = null;

        if (isSuperAdmin()) {
            $users = $this->getModel()::whereHas("roles", function ($query) {
                $query->whereIn("name", ["Lecturer", "Student"]);
            })->filter($request)->paginate();
        }

        if (isLecturer()) {
            $users = $this->getModel()::whereHas("roles", function ($query) {
                $query->whereIn("name", ["Student"]);
            })->whereHas('getProfiles', function ($query) use ($request) {
                $query->filter($request)->sort($request);
            })->with('getProfiles', function ($query) use ($request) {
                $query->sort($request);
            })->filter($request)->sort($request)->paginate();
        }

        $users?->map(function ($item) {
            $item->full_name = $item->getProfiles->full_name;
            $item->mobile_phone = $item->getProfiles->mobile_phone;
            $item->date_of_birth = $item->getProfiles->date_of_birth;
            $item->address = $item->getProfiles->address;
            $item->gender = $item->getProfiles->gender;
            $item->makeHidden(['getProfiles']);
        });

        return $users;
    }

    public function createUser($data = [])
    {
        DB::beginTransaction();
        try {
            $password = Str::random(8);

            $user = $this->getModel()::create(array_merge(
                $data,
                ['password' => bcrypt($password)]
            ));
            $this->userProfileRepo->create(array_merge(
                $data,
                ['user_id' => $user->id]
            ));
            $role = ModelsRole::where('name', $data['role'])->first();
            if ($role) {
                $user->assignRole($role->name);
            }
            DB::commit();
            return [$this->userProfileRepo->getProfiles($user), $password];
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updateUser($id, $data = [])
    {
        try {
            $user = $this->getModel()::find($id);
            $user?->update($data);
            $this->userProfileRepo->update($id, $data);
            $user->unban();
            //Ban user
            if ($data['duration'] && $data['status'] == 'Banned') {
                $created_by_user = Auth::guard('api')?->user();

                $this->banUser($user, $data, $created_by_user);
            }
            $role = ModelsRole::where('name', $data['role'])->first();
            if ($role) {
                $user?->roles()->detach();
                $user?->assignRole($role->name);
            }

            return $this->userProfileRepo->getProfiles($user->with('isBan')->first());
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getUser($id)
    {
        $user = $this->getModel()::find($id);
        return $this->userProfileRepo->getProfiles($user ?? null);
    }

    public function delete($id)
    {
        try {
            $user = $this->getModel()::find($id)->delete();
            $user_profiles = $this->userProfileRepo->delete($id);

            if ($user && $user_profiles) {
                return true;
            }

            return false;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function bulkDelete($ids = [])
    {
        try {
            foreach ($ids as $id) {
                $delete = $this->delete($id);
                if (!$delete) {
                    return false;
                }
            }

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function exportAllUser()
    {
        return $this->export($this->prepareDataUser());
    }

    public function exportUser($ids = [])
    {
        return $this->export($this->prepareDataUser($ids));
    }

    private function export($data = [], $fileName = 'export-all')
    {
        try {
            // Create new Spreadsheet object
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            // Add style to the header
            $styleArray = array(
                'font' => array(
                    'bold' => true,
                ),
                'alignment' => array(
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ),
                'borders' => array(
                    'bottom' => array(
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => array('rgb' => '333333'),
                    ),
                ),
                'fill' => array(
                    'type'       => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                    'rotation'   => 90,
                    'startcolor' => array('rgb' => '0d0d0d'),
                    'endColor'   => array('rgb' => 'f2f2f2'),
                ),
            );
            $spreadsheet->getActiveSheet()->getStyle('A1:I1')->applyFromArray($styleArray);
            // Auto fit column to content
            foreach (range('A', 'I') as $columnID) {
                $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }
            // Set the names of header cells
            $sheet->setCellValue('A1', 'Number');
            $sheet->setCellValue('B1', 'Full Name');
            $sheet->setCellValue('C1', 'Username');
            $sheet->setCellValue('D1', 'Email');
            $sheet->setCellValue('E1', 'Phone');
            $sheet->setCellValue('F1', 'Gender');
            $sheet->setCellValue('G1', 'Date of birth');
            $sheet->setCellValue('H1', 'Address');
            $sheet->setCellValue('I1', 'Role');

            // Add data
            $index = 2;
            foreach ($data as $user) {
                $sheet->setCellValue('A' . $index, $index - 1);
                $sheet->setCellValue('B' . $index, $user['get_profiles']['full_name']);
                $sheet->setCellValue('C' . $index, $user['username']);
                $sheet->setCellValue('D' . $index, $user['email']);
                $sheet->setCellValue('E' . $index, $user['get_profiles']['mobile_phone']);
                $sheet->setCellValue('F' . $index, convertCharToGender($user['get_profiles']['gender']));
                $sheet->setCellValue('G' . $index, formatDate($user['get_profiles']['date_of_birth']));
                $sheet->setCellValue('H' . $index, $user['get_profiles']['address']);
                $sheet->setCellValue('I' . $index, $user['role'][0]);
                $index++;
            }

            $fileName = 'export-all-user';
            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
            header('Cache-Control: max-age=0');
            return $writer->save('php://output');
        } catch (\Exception $e) {

            return false;
        }
    }

    private function prepareDataUser($user_ids = [])
    {
        $users = [];
        if (isSuperAdmin()) {
            $users = $this->getModel()::when($user_ids != [], function ($query) use ($user_ids) {
                $query->whereIn('id', $user_ids);
            })->whereHas("roles", function ($query) {
                $query->whereIn("name", ["Lecturer", "Student"]);
            })->with('getProfiles')->get()->toArray();
        }

        if (isLecturer()) {
            $users = $this->getModel()::when($user_ids != [], function ($query) use ($user_ids) {
                $query->whereIn('id', $user_ids);
            })->whereHas("roles", function ($query) {
                $query->whereIn("name", ["Student"]);
            })->with('getProfiles')->get()->toArray();
        }

        return $users;
    }

    public function getBanHistory($id)
    {
        try {
            $listBan = $this->getListBan($id);
            foreach ($listBan as $ban) {
                $ban->created_by_user = $this->getBasicProfile($ban->created_by_id);
            }

            return $listBan;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    private function getBasicProfile($id)
    {
        $user = $this->getUser($id);

        return $user;
    }
}
