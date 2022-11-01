<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_profiles')->insert([
            ['user_id' => 1, 'full_name' => 'Bùi Thùy Nữ', 'date_of_birth' => '2001-11-02 00:23:44', 'mobile_phone' => '0361413803', 'gender' => 'F', 'address' => '651 Trường Chinh, quận Thanh Xuân, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 2, 'full_name' => 'Đinh Tùng Hân', 'date_of_birth' => '1997-03-08 04:53:19', 'mobile_phone' => '0817199605', 'gender' => 'M', 'address' => '601 Nguyễn Biểu, quận 5, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 3, 'full_name' => 'Mạc Thùy Yến', 'date_of_birth' => '2001-02-21 21:09:51', 'mobile_phone' => '0940054451', 'gender' => 'U', 'address' => '976 Nguyễn Khuyến, quận Hà Đông, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 4, 'full_name' => 'Hồ Quốc Duyên', 'date_of_birth' => '2003-09-02 07:29:36', 'mobile_phone' => '0814781106', 'gender' => 'F', 'address' => '942 Nguyễn Văn Trỗi, quận Phú Nhuận, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 5, 'full_name' => 'Nguyễn Thanh Danh', 'date_of_birth' => '2008-11-06 20:23:27', 'mobile_phone' => '0140894571', 'gender' => 'M', 'address' => '182 Nguyễn Biểu, quận 5, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 6, 'full_name' => 'Bùi Vũ Anh', 'date_of_birth' => '1993-06-10 13:32:49', 'mobile_phone' => '0176993825', 'gender' => 'F', 'address' => '391 Lê Lợi', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 7, 'full_name' => 'Lê Như Hào', 'date_of_birth' => '1998-08-20 23:40:49', 'mobile_phone' => '0617822591', 'gender' => 'U', 'address' => '752 Nguyễn Khuyến, quận Hà Đông, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 8, 'full_name' => 'Nguyễn Việt Anh', 'date_of_birth' => '1988-03-18 03:39:49', 'mobile_phone' => '0475195983', 'gender' => 'U', 'address' => '368 Trần Hưng Đạo, Hiệp Phú, quận 9, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 9, 'full_name' => 'Trịnh Vũ Nữ', 'date_of_birth' => '2003-09-12 22:49:26', 'mobile_phone' => '0748005543', 'gender' => 'M', 'address' => '942 Lý Thường Kiệt, Quận 10, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 10, 'full_name' => 'Nguyễn Khải Ngân', 'date_of_birth' => '1998-08-25 02:35:11', 'mobile_phone' => '0350587427', 'gender' => 'U', 'address' => '2 Phạm Minh Đức', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 11, 'full_name' => 'Mạc Thùy Thương', 'date_of_birth' => '1979-11-05 10:57:09', 'mobile_phone' => '0262407728', 'gender' => 'M', 'address' => '486 Cách Mạng Tháng 8, Thành phố Bà Rịa, Tỉnh Bà Rịa Vũng Tàu', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 12, 'full_name' => 'Trương Hồng Bảo', 'date_of_birth' => '1990-06-17 12:09:24', 'mobile_phone' => '0237112600', 'gender' => 'U', 'address' => '292 Trần Quốc Tản, Quận Hoàn Kiếm, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 13, 'full_name' => 'Trương Quốc Dương', 'date_of_birth' => '1987-02-09 04:04:58', 'mobile_phone' => '0206405769', 'gender' => 'F', 'address' => '450 Quang Trung, Gò Vấp, Thành Phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 14, 'full_name' => 'Nguyễn Trúc Dương', 'date_of_birth' => '2002-12-27 13:50:19', 'mobile_phone' => '0262407556', 'gender' => 'F', 'address' => '140 Lê Hồng Phong, quận 10, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 15, 'full_name' => 'Triệu Bảo Danh', 'date_of_birth' => '2007-09-18 15:57:55', 'mobile_phone' => '0812387629', 'gender' => 'M', 'address' => '3 Võ Văn Ngân, Linh Trung, Thủ Đức, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 16, 'full_name' => 'Triệu Tùng Thịnh', 'date_of_birth' => '2004-04-20 05:18:56', 'mobile_phone' => '0986816903', 'gender' => 'U', 'address' => '775 Trần Quang Khải, Huyện Long Thành, Tỉnh Đồng Nai', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 17, 'full_name' => 'Phương Thị Mỹ Thiên', 'date_of_birth' => '1980-11-07 20:26:11', 'mobile_phone' => '0331165864', 'gender' => 'U', 'address' => '751 Nguyễn Huệ, Thành Phố Tuy Hòa, Tỉnh Phú Yên', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 18, 'full_name' => 'Lê Việt Linh', 'date_of_birth' => '1983-12-19 02:23:27', 'mobile_phone' => '0659141770', 'gender' => 'M', 'address' => '158 Quang Trung, Gò Vấp, Thành Phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 19, 'full_name' => 'Bùi Hồng Thơ', 'date_of_birth' => '1984-12-11 19:39:35', 'mobile_phone' => '0812721173', 'gender' => 'M', 'address' => '515 Cộng Hòa, Tân Bình, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 20, 'full_name' => 'Phan Hồng Nga', 'date_of_birth' => '1995-02-10 15:32:03', 'mobile_phone' => '0138735432', 'gender' => 'U', 'address' => '405 Trần Não, Quận 2, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 21, 'full_name' => 'Hồ Trúc Phúc', 'date_of_birth' => '1987-07-30 09:55:11', 'mobile_phone' => '0224364184', 'gender' => 'F', 'address' => '823 Nguyễn Biểu, quận 5, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 22, 'full_name' => 'Trần Quốc Loan', 'date_of_birth' => '1980-12-31 01:37:42', 'mobile_phone' => '0460594121', 'gender' => 'M', 'address' => '888 Hoàng Hoa Thám', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 23, 'full_name' => 'Phan Như Huy', 'date_of_birth' => '1988-06-25 09:47:12', 'mobile_phone' => '0475195101', 'gender' => 'M', 'address' => '57 Hoàng Hoa Thám', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 24, 'full_name' => 'Phan Việt Tú', 'date_of_birth' => '1989-03-06 04:54:23', 'mobile_phone' => '0569496401', 'gender' => 'U', 'address' => '951 Ngô Quyền, Thành phố Hải Dương, Tỉnh Hải Dương', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 25, 'full_name' => 'Trần Thanh Tuyền', 'date_of_birth' => '1989-12-31 07:40:19', 'mobile_phone' => '0228643329', 'gender' => 'M', 'address' => '642 Ngô Quyền, Thành phố Hải Dương, Tỉnh Hải Dương', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 26, 'full_name' => 'Đinh Việt Khang', 'date_of_birth' => '1992-04-18 00:44:43', 'mobile_phone' => '0621286497', 'gender' => 'M', 'address' => '638 Lê Lợi', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 27, 'full_name' => 'Trịnh Văn Phúc', 'date_of_birth' => '1993-08-24 12:54:44', 'mobile_phone' => '0245113570', 'gender' => 'F', 'address' => '940 Nguyễn Văn Trỗi, quận Phú Nhuận, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 28, 'full_name' => 'Lý Hữu Hân', 'date_of_birth' => '1988-09-18 20:35:20', 'mobile_phone' => '0573391294', 'gender' => 'U', 'address' => '220 Cách Mạng Tháng 8, Thành phố Bà Rịa, Tỉnh Bà Rịa Vũng Tàu', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 29, 'full_name' => 'Hồ Quang Hào', 'date_of_birth' => '1990-09-17 21:00:56', 'mobile_phone' => '0616246985', 'gender' => 'U', 'address' => '662 Tôn Đức Thắng', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 30, 'full_name' => 'Lê Quang Tuyết', 'date_of_birth' => '1981-06-01 08:41:45', 'mobile_phone' => '0859186635', 'gender' => 'F', 'address' => '954 Tô Hiệu, Quận Tân Phú, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 31, 'full_name' => 'Lý Minh Thương', 'date_of_birth' => '1988-11-02 05:08:39', 'mobile_phone' => '0152829661', 'gender' => 'F', 'address' => '241 Lê Hồng Phong, quận 10, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 32, 'full_name' => 'Trần Khải Sinh', 'date_of_birth' => '1991-07-05 18:04:26', 'mobile_phone' => '0461380746', 'gender' => 'U', 'address' => '35 Trường Chinh, quận Thanh Xuân, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 33, 'full_name' => 'Lê Minh Thúy', 'date_of_birth' => '1979-12-07 08:27:07', 'mobile_phone' => '0586265843', 'gender' => 'U', 'address' => '931 Huỳnh Tấn Phát, P.Phú Nhuận, Quận 7, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 34, 'full_name' => 'Ngô Vũ Nhi', 'date_of_birth' => '1996-09-22 08:16:17', 'mobile_phone' => '0532527106', 'gender' => 'M', 'address' => '195 Trường Chinh, quận Thanh Xuân, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 35, 'full_name' => 'Lê Thu Đạt', 'date_of_birth' => '1992-04-05 00:40:07', 'mobile_phone' => '0206405476', 'gender' => 'U', 'address' => '716 Trần Quang Khải, Huyện Long Thành, Tỉnh Đồng Nai', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 36, 'full_name' => 'Phương Thùy Đạt', 'date_of_birth' => '1993-09-08 14:48:54', 'mobile_phone' => '0179673814', 'gender' => 'U', 'address' => '729 Trần Quốc Tản, Quận Hoàn Kiếm, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 37, 'full_name' => 'Nguyễn Thị Ngân', 'date_of_birth' => '1979-06-12 12:54:39', 'mobile_phone' => '0273919277', 'gender' => 'F', 'address' => '976 Lê Duẩn', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 38, 'full_name' => 'Nguyễn Thu Vương', 'date_of_birth' => '2008-10-10 20:44:57', 'mobile_phone' => '0711578476', 'gender' => 'U', 'address' => '500 Nguyễn Văn Cừ, P.Nguyễn Cư Trinh, Quận 1, Thành Phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 39, 'full_name' => 'Đinh Việt Sinh', 'date_of_birth' => '1979-07-22 20:04:16', 'mobile_phone' => '0307461947', 'gender' => 'U', 'address' => '795 Trần Não, Quận 2, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 40, 'full_name' => 'Lê Thi Thành', 'date_of_birth' => '1986-07-12 20:23:12', 'mobile_phone' => '0830930253', 'gender' => 'U', 'address' => '499 Cách Mạng Tháng 8, Thành phố Bà Rịa, Tỉnh Bà Rịa Vũng Tàu', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 41, 'full_name' => 'Triệu Công Thanh', 'date_of_birth' => '2004-05-02 15:07:59', 'mobile_phone' => '0159826245', 'gender' => 'M', 'address' => '262 Nguyễn Hữu Cảnh, quận Bình Thạnh, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 42, 'full_name' => 'Đinh Thu Như', 'date_of_birth' => '1993-02-28 04:06:51', 'mobile_phone' => '0745661983', 'gender' => 'M', 'address' => '427 Lê Hồng Phong, quận 10, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 43, 'full_name' => 'Đinh Tuyết Nhung', 'date_of_birth' => '1996-04-18 14:01:17', 'mobile_phone' => '0725446420', 'gender' => 'F', 'address' => '544 Cộng Hòa, Tân Bình, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 44, 'full_name' => 'Phương Hữu Trang', 'date_of_birth' => '1995-03-06 15:31:12', 'mobile_phone' => '0107182404', 'gender' => 'U', 'address' => '710 Lê Duẩn', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 45, 'full_name' => 'Bùi Khải Thu', 'date_of_birth' => '1987-05-14 12:32:55', 'mobile_phone' => '0591332253', 'gender' => 'F', 'address' => '184 Nguyễn Khuyến, quận Hà Đông, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 46, 'full_name' => 'Trịnh Hồng Tú', 'date_of_birth' => '1996-07-07 04:56:47', 'mobile_phone' => '0904983769', 'gender' => 'M', 'address' => '996 Tô Hiệu, Quận Tân Phú, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 47, 'full_name' => 'Phương Thị Hòa', 'date_of_birth' => '1989-11-22 18:58:44', 'mobile_phone' => '0617822434', 'gender' => 'F', 'address' => '86 Trần Não, Quận 2, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 48, 'full_name' => 'Bùi Thùy Hảo', 'date_of_birth' => '1992-02-08 10:24:15', 'mobile_phone' => '0724142606', 'gender' => 'M', 'address' => '99 Lê Lợi', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 49, 'full_name' => 'Đinh Mai Hoàng Bảo', 'date_of_birth' => '1993-07-20 11:11:03', 'mobile_phone' => '0816237571', 'gender' => 'U', 'address' => '231 Tô Hiệu, Quận Tân Phú, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 50, 'full_name' => 'Phương Văn Tuyền', 'date_of_birth' => '1997-06-26 19:02:16', 'mobile_phone' => '0493000506', 'gender' => 'F', 'address' => '826 Trần Não, Quận 2, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 51, 'full_name' => 'Trần Thanh Thùy', 'date_of_birth' => '1979-09-11 17:55:58', 'mobile_phone' => '0441914859', 'gender' => 'F', 'address' => '430 Lý Thường Kiệt, Quận 10, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 52, 'full_name' => 'Phương Minh Ánh', 'date_of_birth' => '1999-05-07 14:41:32', 'mobile_phone' => '0401919370', 'gender' => 'M', 'address' => '371 Nguyễn Huệ, Thành Phố Tuy Hòa, Tỉnh Phú Yên', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 53, 'full_name' => 'Hồ Thu Huyền', 'date_of_birth' => '1984-05-11 07:12:40', 'mobile_phone' => '0552442983', 'gender' => 'F', 'address' => '439 Cộng Hòa, Tân Bình, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 54, 'full_name' => 'Hồ Trường Hùng', 'date_of_birth' => '2008-05-13 21:33:45', 'mobile_phone' => '0556538859', 'gender' => 'U', 'address' => '167 Phạm Minh Đức', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 55, 'full_name' => 'Trịnh Công Vi', 'date_of_birth' => '1994-01-18 22:49:11', 'mobile_phone' => '0115017629', 'gender' => 'F', 'address' => '44 Võ Văn Ngân, Linh Trung, Thủ Đức, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 56, 'full_name' => 'Phan Hồng Hùng', 'date_of_birth' => '2008-05-01 21:26:13', 'mobile_phone' => '0195041347', 'gender' => 'M', 'address' => '402 Trường Chinh, quận Thanh Xuân, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 57, 'full_name' => 'Đinh Hoàng Yến', 'date_of_birth' => '1994-09-07 19:18:50', 'mobile_phone' => '0404293860', 'gender' => 'M', 'address' => '95 Quang Trung, Gò Vấp, Thành Phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 58, 'full_name' => 'Phan Thị Mỹ Việt', 'date_of_birth' => '2002-10-02 01:47:20', 'mobile_phone' => '0594981959', 'gender' => 'M', 'address' => '872 Trần Hưng Đạo, Hiệp Phú, quận 9, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 59, 'full_name' => 'Triệu Thị Mỹ Hùng', 'date_of_birth' => '1984-11-07 04:26:30', 'mobile_phone' => '0195041348', 'gender' => 'F', 'address' => '451 Lê Duẩn', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 60, 'full_name' => 'Phương Minh Tuyết', 'date_of_birth' => '1990-02-01 13:28:23', 'mobile_phone' => '0958185113', 'gender' => 'M', 'address' => '637 Cộng Hòa, Tân Bình, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 61, 'full_name' => 'Ngô Tùng Dương', 'date_of_birth' => '1987-02-20 11:58:04', 'mobile_phone' => '0133079969', 'gender' => 'U', 'address' => '530 Nguyễn Khuyến, quận Hà Đông, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 62, 'full_name' => 'Mạc Quốc Đạt', 'date_of_birth' => '1983-07-14 18:05:31', 'mobile_phone' => '0758924917', 'gender' => 'M', 'address' => '572 Trường Chinh, quận Thanh Xuân, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 63, 'full_name' => 'Phan Thị Mỹ Hùng', 'date_of_birth' => '1996-04-11 14:07:47', 'mobile_phone' => '0594981693', 'gender' => 'U', 'address' => '541 Cộng Hòa, Tân Bình, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 64, 'full_name' => 'Bùi Thị Mỹ Sơn', 'date_of_birth' => '1995-11-12 11:31:56', 'mobile_phone' => '0219044643', 'gender' => 'U', 'address' => '566 Nguyễn Văn Lương', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 65, 'full_name' => 'Đinh Việt Vương', 'date_of_birth' => '1993-04-06 13:30:53', 'mobile_phone' => '0514044647', 'gender' => 'U', 'address' => '539 Trần Não, Quận 2, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 66, 'full_name' => 'Nguyễn Trường Yên', 'date_of_birth' => '1984-06-13 16:10:40', 'mobile_phone' => '0855973106', 'gender' => 'U', 'address' => '177 Nguyễn Hữu Cảnh, quận Bình Thạnh, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 67, 'full_name' => 'Hồ Hồng Vy', 'date_of_birth' => '2008-11-01 14:55:49', 'mobile_phone' => '0552442626', 'gender' => 'F', 'address' => '38 Huỳnh Tấn Phát, P.Phú Nhuận, Quận 7, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 68, 'full_name' => 'Trương Vũ Thư', 'date_of_birth' => '2003-08-22 02:07:51', 'mobile_phone' => '0417995563', 'gender' => 'F', 'address' => '517 Phan Đình Phùng', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 69, 'full_name' => 'Trương Bảo Tuyết', 'date_of_birth' => '1979-10-01 01:16:24', 'mobile_phone' => '0812721172', 'gender' => 'U', 'address' => '756 Trần Quốc Tản, Quận Hoàn Kiếm, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 70, 'full_name' => 'Bùi Văn Thu', 'date_of_birth' => '2002-12-11 01:45:58', 'mobile_phone' => '0489836606', 'gender' => 'U', 'address' => '680 Phạm Ngọc Thạch', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 71, 'full_name' => 'Đinh Thùy Bảo', 'date_of_birth' => '1985-04-25 09:11:30', 'mobile_phone' => '0480608802', 'gender' => 'F', 'address' => '763 Tô Hiệu, Quận Tân Phú, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 72, 'full_name' => 'Triệu Tùng Triệu', 'date_of_birth' => '1989-12-11 18:19:51', 'mobile_phone' => '0859186797', 'gender' => 'F', 'address' => '667 Nguyễn Hữu Cảnh, quận Bình Thạnh, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 73, 'full_name' => 'Lê Trường Hân', 'date_of_birth' => '2001-11-16 08:05:00', 'mobile_phone' => '0193487253', 'gender' => 'U', 'address' => '80 Phạm Ngọc Thạch', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 74, 'full_name' => 'Triệu Việt Nhân', 'date_of_birth' => '1992-12-27 23:54:02', 'mobile_phone' => '0765793136', 'gender' => 'M', 'address' => '899 Ngô Quyền, Thành phố Hải Dương, Tỉnh Hải Dương', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 75, 'full_name' => 'Phan Tuyết Thịnh', 'date_of_birth' => '2007-03-19 11:46:29', 'mobile_phone' => '0228643647', 'gender' => 'F', 'address' => '749 Tô Hiệu, Quận Tân Phú, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 76, 'full_name' => 'Trương Bảo Yên', 'date_of_birth' => '1993-09-25 07:31:41', 'mobile_phone' => '0987738709', 'gender' => 'F', 'address' => '923 Lê Duẩn', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 77, 'full_name' => 'Trần Thị Mỹ Thịnh', 'date_of_birth' => '1979-05-21 10:23:04', 'mobile_phone' => '0904983173', 'gender' => 'M', 'address' => '313 Nguyễn Văn Trỗi, quận Phú Nhuận, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 78, 'full_name' => 'Triệu Công Ánh', 'date_of_birth' => '1993-11-07 23:30:54', 'mobile_phone' => '0925716822', 'gender' => 'M', 'address' => '61 Quang Trung, Gò Vấp, Thành Phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 79, 'full_name' => 'Trịnh Lam Huyền', 'date_of_birth' => '2001-08-08 10:55:14', 'mobile_phone' => '0917922600', 'gender' => 'M', 'address' => '485 Huỳnh Tấn Phát, P.Phú Nhuận, Quận 7, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 80, 'full_name' => 'Phan Văn Khanh', 'date_of_birth' => '2005-09-19 05:28:02', 'mobile_phone' => '0138735401', 'gender' => 'M', 'address' => '209 Trần Não, Quận 2, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 81, 'full_name' => 'Đinh Hữu Anh', 'date_of_birth' => '1999-07-20 18:49:44', 'mobile_phone' => '0105304270', 'gender' => 'U', 'address' => '397 Trần Quốc Tản, Quận Hoàn Kiếm, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 82, 'full_name' => 'Mạc Thị Mỹ Trúc', 'date_of_birth' => '2004-07-23 22:23:56', 'mobile_phone' => '0895876404', 'gender' => 'F', 'address' => '539 Cộng Hòa, Tân Bình, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 83, 'full_name' => 'Trịnh Lam Tuyết', 'date_of_birth' => '1988-09-10 04:33:02', 'mobile_phone' => '0307461605', 'gender' => 'F', 'address' => '475 Võ Văn Ngân, Linh Trung, Thủ Đức, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 84, 'full_name' => 'Ngô Quốc Thịnh', 'date_of_birth' => '1989-07-23 07:32:27', 'mobile_phone' => '0178680770', 'gender' => 'F', 'address' => '950 Tô Hiệu, Quận Tân Phú, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 85, 'full_name' => 'Trần Bảo Dương', 'date_of_birth' => '2007-03-05 00:39:06', 'mobile_phone' => '0140894788', 'gender' => 'F', 'address' => '918 Quang Trung, Gò Vấp, Thành Phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 86, 'full_name' => 'Trịnh Hoàng Vy', 'date_of_birth' => '1990-10-04 21:02:36', 'mobile_phone' => '0266009140', 'gender' => 'U', 'address' => '601 Quang Trung, Gò Vấp, Thành Phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 87, 'full_name' => 'Nguyễn Thùy Oanh', 'date_of_birth' => '1983-11-13 05:21:41', 'mobile_phone' => '0273919895', 'gender' => 'U', 'address' => '489 Phạm Minh Đức', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 88, 'full_name' => 'Nguyễn Thu Yên', 'date_of_birth' => '2000-08-07 10:26:06', 'mobile_phone' => '0725446788', 'gender' => 'M', 'address' => '352 Tô Hiệu, Quận Tân Phú, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 89, 'full_name' => 'Trương Tùng Duyên', 'date_of_birth' => '1984-09-24 20:14:14', 'mobile_phone' => '0586265878', 'gender' => 'F', 'address' => '831 Phạm Minh Đức', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 90, 'full_name' => 'Trịnh Quang Hào', 'date_of_birth' => '2000-04-21 15:30:05', 'mobile_phone' => '0439427946', 'gender' => 'U', 'address' => '174 Trần Quốc Tản, Quận Hoàn Kiếm, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 91, 'full_name' => 'Lê Thị Vương', 'date_of_birth' => '1986-06-26 00:35:54', 'mobile_phone' => '0391515410', 'gender' => 'F', 'address' => '980 Lê Hồng Phong, quận 10, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 92, 'full_name' => 'Đinh Thi Vy', 'date_of_birth' => '1987-05-29 13:48:24', 'mobile_phone' => '0776109420', 'gender' => 'F', 'address' => '568 Nguyễn Hữu Cảnh, quận Bình Thạnh, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 93, 'full_name' => 'Mạc Khải Thơ', 'date_of_birth' => '1984-08-18 23:06:55', 'mobile_phone' => '0711578375', 'gender' => 'M', 'address' => '213 Cộng Hòa, Tân Bình, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 94, 'full_name' => 'Hồ Hoàng Trang', 'date_of_birth' => '1980-08-03 09:04:27', 'mobile_phone' => '0507248270', 'gender' => 'F', 'address' => '458 Lý Thường Kiệt, Quận 10, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 95, 'full_name' => 'Triệu Bảo Loan', 'date_of_birth' => '1992-08-02 19:48:49', 'mobile_phone' => '0492187751', 'gender' => 'U', 'address' => '185 Phan Đình Phùng', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 96, 'full_name' => 'Triệu Thanh Hoàng', 'date_of_birth' => '2008-09-05 04:53:39', 'mobile_phone' => '0493000909', 'gender' => 'U', 'address' => '37 Lê Lợi', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 97, 'full_name' => 'Triệu Quang Nữ', 'date_of_birth' => '2004-01-09 12:09:37', 'mobile_phone' => '0575657176', 'gender' => 'F', 'address' => '735 Nguyễn Huệ, Thành Phố Tuy Hòa, Tỉnh Phú Yên', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 98, 'full_name' => 'Bùi Tuyết Trinh', 'date_of_birth' => '2007-12-19 17:12:56', 'mobile_phone' => '0520297804', 'gender' => 'M', 'address' => '428 Nguyễn Văn Trỗi, quận Phú Nhuận, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 99, 'full_name' => 'Mạc Vũ Dương', 'date_of_birth' => '1988-04-25 01:44:38', 'mobile_phone' => '0584635912', 'gender' => 'F', 'address' => '118 Phạm Minh Đức', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 100, 'full_name' => 'Triệu Việt Danh', 'date_of_birth' => '2005-11-10 10:09:16', 'mobile_phone' => '0870292764', 'gender' => 'F', 'address' => '619 Nguyễn Văn Cừ, P.Nguyễn Cư Trinh, Quận 1, Thành Phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 101, 'full_name' => 'Lê Thi Trinh', 'date_of_birth' => '1985-01-03 03:54:48', 'mobile_phone' => '0953243716', 'gender' => 'F', 'address' => '821 Nguyễn Hữu Cảnh, quận Bình Thạnh, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 102, 'full_name' => 'Đinh Như Khang', 'date_of_birth' => '1983-01-05 08:12:09', 'mobile_phone' => '0115017410', 'gender' => 'F', 'address' => '917 Nguyễn Biểu, quận 5, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 103, 'full_name' => 'Mạc Công Nhân', 'date_of_birth' => '1988-07-24 06:21:33', 'mobile_phone' => '0218355391', 'gender' => 'F', 'address' => '276 Hoàng Hoa Thám', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 104, 'full_name' => 'Nguyễn Công Huyền', 'date_of_birth' => '1983-09-03 00:08:32', 'mobile_phone' => '0178680574', 'gender' => 'U', 'address' => '146 Nguyễn Khuyến, quận Hà Đông, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 105, 'full_name' => 'Hồ Trúc Anh', 'date_of_birth' => '1995-07-14 18:10:54', 'mobile_phone' => '0659141800', 'gender' => 'U', 'address' => '377 Lê Hồng Phong, quận 10, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 106, 'full_name' => 'Triệu Hồng Nữ', 'date_of_birth' => '2007-10-06 06:23:41', 'mobile_phone' => '0777936751', 'gender' => 'U', 'address' => '865 Lê Duẩn', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 107, 'full_name' => 'Trịnh Thi Sơn', 'date_of_birth' => '1986-07-07 06:49:00', 'mobile_phone' => '0917922428', 'gender' => 'F', 'address' => '323 Trường Chinh, quận Thanh Xuân, Thành phố Hà Nội', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 108, 'full_name' => 'Hồ Công Thư', 'date_of_birth' => '1992-08-15 06:23:17', 'mobile_phone' => '0898798165', 'gender' => 'F', 'address' => '730 Phạm Ngọc Thạch', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 109, 'full_name' => 'Lê Thùy Thúy', 'date_of_birth' => '1996-03-07 10:12:47', 'mobile_phone' => '0655531420', 'gender' => 'U', 'address' => '710 Trần Quang Khải, Huyện Long Thành, Tỉnh Đồng Nai', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 110, 'full_name' => 'Trương Công Việt', 'date_of_birth' => '1991-05-31 23:13:28', 'mobile_phone' => '0579998800', 'gender' => 'U', 'address' => '346 Lý Thường Kiệt, Quận 10, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 111, 'full_name' => 'Lý Thị Nhung', 'date_of_birth' => '1979-12-19 15:30:10', 'mobile_phone' => '0544244531', 'gender' => 'M', 'address' => '233 Phạm Minh Đức', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 112, 'full_name' => 'Phương Khải Duyên', 'date_of_birth' => '1993-06-30 12:31:29', 'mobile_phone' => '0386913370', 'gender' => 'M', 'address' => '995 Nguyễn Biểu, quận 5, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 113, 'full_name' => 'Đinh Vũ Thu', 'date_of_birth' => '1988-01-21 03:08:38', 'mobile_phone' => '0865017591', 'gender' => 'F', 'address' => '149 Trần Hưng Đạo, Hiệp Phú, quận 9, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 114, 'full_name' => 'Triệu Hữu Phúc', 'date_of_birth' => '1980-11-11 16:18:37', 'mobile_phone' => '0307461797', 'gender' => 'U', 'address' => '407 Nguyễn Huệ, Thành Phố Tuy Hòa, Tỉnh Phú Yên', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 115, 'full_name' => 'Đinh Thị Mỹ Hào', 'date_of_birth' => '1984-08-24 00:28:28', 'mobile_phone' => '0986816769', 'gender' => 'F', 'address' => '763 Tô Hiệu, Quận Tân Phú, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 116, 'full_name' => 'Hồ Trường Oanh', 'date_of_birth' => '1993-09-12 02:26:06', 'mobile_phone' => '0224364606', 'gender' => 'U', 'address' => '366 Lê Hồng Phong, quận 10, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 117, 'full_name' => 'Trương Thùy Thanh', 'date_of_birth' => '1989-08-27 22:15:43', 'mobile_phone' => '0285390312', 'gender' => 'U', 'address' => '375 Nguyễn Văn Cừ, P.Nguyễn Cư Trinh, Quận 1, Thành Phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 118, 'full_name' => 'Hồ Việt Thịnh', 'date_of_birth' => '1994-02-25 06:42:40', 'mobile_phone' => '0492575860', 'gender' => 'U', 'address' => '298 Nguyễn Văn Cừ, P.Nguyễn Cư Trinh, Quận 1, Thành Phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 119, 'full_name' => 'Trương Quốc Thúy', 'date_of_birth' => '1983-05-23 22:49:40', 'mobile_phone' => '0273919979', 'gender' => 'F', 'address' => '625 Ngô Quyền, Thành phố Hải Dương, Tỉnh Hải Dương', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['user_id' => 120, 'full_name' => 'Đinh Thu Thành', 'date_of_birth' => '2003-02-11 02:42:07', 'mobile_phone' => '0237112196', 'gender' => 'F', 'address' => '367 Trần Não, Quận 2, Thành phố Hồ Chí Minh', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
        ]);
    }
}
