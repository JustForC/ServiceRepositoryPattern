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

    // Save New Student Data
    public function save($data)
    {
        $student = new $this->student;

        $student->name = $data['name'];
        $student->gender = $data['gender'];
        $student->address = $data['address'];
        $student->birthdate = $data['birthdate'];
        $student->birthplace = $data['birthplace'];
        $student->studentNumber = $data['studentNumber'];
        $student->imagePath = $data['imagePath'];

        $student->save();

        return $student->fresh();
    }

    // Take One Student
    public function getId($id)
    {
        return $this->student->where('id', '=', $id)->first();
    }

    // Update Student
    public function update($data, $id)
    {
        $student = new $this->find($id);

        $student->name = $data['name'];
        $student->gender = $data['gender'];
        $student->address = $data['address'];
        $student->birthdate = $data['birthdate'];
        $student->birthplace = $data['birthplace'];
        $student->studentNumber = $data['studentNumber'];
        $student->imagePath = $data['imagePath'];

        $student->update();

        return $student;
    }

    // Delete One Student
    public function deleteId($id)
    {
        $student = $this->student->find($id)->delete();
        return $student;
    }

}
