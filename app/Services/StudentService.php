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
