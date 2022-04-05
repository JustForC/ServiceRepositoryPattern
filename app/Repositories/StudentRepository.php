<?php

namespace App\Repositories;

use App\Models\Student;

class StudenRepository
{
    protected $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function deleteId($id)
    {
        $student = $this->student->find($id)->delete();
        return $student;
    }

}
