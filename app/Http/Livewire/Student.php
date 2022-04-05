<?php

namespace App\Http\Livewire;

use App\Services\StudentService;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Student extends Component
{
    use WithFileUploads;

    public $name, $gender, $birthplace, $birthdate, $address, $studentNumber, $image;
    public $imagePath;
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

    protected $listeners = [
        'update',
        'delete',
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

        $this->imagePath = Storage::putFileAs($this->image, time());

        $data = [
            'name' => $this->name,
            'gender' => $this->gender,
            'birthplace' => $this->birthplace,
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'studentNumber' => $this->studentNumber,
            'imagePath' => $this->imagePath,
        ];

        try
        {
            $service = $this->service->save($data);
            $this->studentid = $service->id;
        } catch (Exception $e) {

        }

        $this->emit('refreshTable');
        $this->resetInput();
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
            'imagePath' => $this->imagePath,
        ];

        try
        {
            $this->service->update($data, $id);
        } catch (Exception $e) {

        }

        $this->emit('refreshTable');
        $this->resetInput();
    }

    public function delete($id)
    {
        try
        {
            $this->service->deleteByid($id);
        } catch (Exception $e) {

        }

        $this->emit('refreshTable');
    }

    public function show($id)
    {
        try
        {
            $service = $this->service->getId($id);
        } catch (Exception $e) {

        }
    }

    public function check()
    {
        if (!$this->studentNumber) {
            $this->save();
        } elseif ($this->studentNumber) {
            $this->update($this->studentNumber);
        }
    }

    public function resetInput()
    {
        $this->name = null;
        $this->gender = null;
        $this->birthplace = null;
        $this->birthdate = null;
        $this->address = null;
        $this->studentNumber = null;
        $this->image = null;
        $this->imagePath = null;
        $this->studentid = null;
    }
}
