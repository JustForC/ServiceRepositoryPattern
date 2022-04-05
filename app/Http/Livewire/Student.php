<?php

namespace App\Http\Livewire;

use App\Services\StudentService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Student extends Component
{
    use WithFileUploads;

    public $name, $gender, $birthplace, $birthdate, $address, $studentNumber, $image;
    public $studentid;

    protected $paginationTheme = 'bootstrap';

    protected $service;

    protected $rules = [
        'name' => 'required',
        'gender' => 'required',
        'birthplace' => 'required',
        'birthdate' => 'required',
        'address' => 'required',
        'studentNumber' => 'required|numeric|unique:students',
        'image' => 'required|file|mime:jpg,png,jpeg|',
    ];

    public function mount(StudentService $service)
    {
        $this->service = $service;
    }

    public function render()
    {
        return view('livewire.student');
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'gender' => $this->gender,
            'birthplace' => $this->birthplace,
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'studentNumber' => $this->studentNumber,
            'imagePath' => $imagePath,
        ];

        $service = $this->service->save($data);

        $this->studentid = $service->id;
    }

    public function update($id)
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'gender' => $this->gender,
            'birthplace' => $this->birthplace,
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'studentNumber' => $this->studentNumber,
            'imagePath' => $imagePath,
        ];

        $this->service->update($data, $id);
    }

    public function delete($id)
    {
        $this->service->deleteByid($id);
    }

    public function check()
    {
        if (!$this->studentNumber) {
            $this->save();
        } elseif ($this->studentNumber) {
            $this->update($this->studentNumber);
        }
    }
}
