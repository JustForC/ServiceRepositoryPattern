<?php

namespace App\Services;

use App\Repositories\StudenRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentService
{

    protected $repository;

    public function __construct(StudenRepository $repository)
    {
        $this->repository = $repository;
    }

    // Save New Student Data
    public function save($data)
    {
        return $this->repository->save($data);
    }

    // Get Tne Student
    public function getId($id)
    {
        return $this->repository->getId($id);
    }

    // Update Student
    public function update($data, $id)
    {
        DB::beginTransaction();

        try
        {
            $student = $this->repository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
        }

        DB::commit();

        return $student;
    }

    // Delete One Student
    public function deleteById($id)
    {
        DB::beginTransaction();

        try
        {
            $student = $this->repository->deleteId($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
        }

        DB::commit();

        return $student;
    }

}
