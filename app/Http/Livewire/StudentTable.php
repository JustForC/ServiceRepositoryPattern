<?php

namespace App\Http\Livewire;

use App\Models\Student;
use App\Services\StudentService;
use Livewire\Component;
use Livewire\WithPagination;

class StudentTable extends Component
{
    use WithPagination;

    protected $service;

    public $searchKey;
    public $paginationKey = 2;
    public $orderKey = "id";
    public $order = 'asc';

    protected $listeners = [
        'refreshTable' => '$refresh',
    ];

    public function mount(StudentService $service)
    {
        $this->service = $service;
    }

    public function render()
    {
        $students = Student::where('name', 'LIKE', '%' . $this->searchKey . '%')
            ->orWhere('gender', 'LIKE', '%' . $this->searchKey . '%')
            ->orWhere('birthplace', 'LIKE', '%' . $this->searchKey . '%')
            ->orWhere('birthdate', 'LIKE', '%' . $this->searchKey . '%')
            ->orWhere('studentNumber', 'LIKE', '%' . $this->searchKey . '%')
            ->orWhere('address', 'LIKE', '%' . $this->searchKey . '%')
            ->orderBy($this->orderKey, $this->order)
            ->paginate($this->paginationKey);
        return view('livewire.student-table')->with(['students' => $students]);
    }

    public function selectType($type, $id)
    {
        if ($type == "update") {
            $this->emit('update', $id);
        } elseif ($type == "delete") {
            $this->emit('delete', $id);
        }
    }
}
