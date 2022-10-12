<?php

namespace App\Repositories\Course;

use App\Repositories\BaseRepository;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Course::class;
    }
}
