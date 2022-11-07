<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use HasFactory, SoftDeletes, Filterable, Sortable;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('softDelete', function ($builder) {
            return $builder->whereNull('deleted_at');
        });
    }

    protected $filterable = [
        'full_name'
    ];

    public $sortables = ['full_name'];

    public function filterFullName($query, $value)
    {
        return $query->where('full_name', 'LIKE', '%' . $value . '%');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'full_name',
        'mobile_phone',
        'date_of_birth',
        'address',
        'gender',
    ];
}
