<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadFile extends Component
{
    use WithFileUploads;

    public array $breadcrumb = [
        ['lable' => 'Home', 'link' => '/livewire/home'],
        ['lable' => 'Basic Crud', 'link' => '#']
    ];

    public $id = "";
    public $name = "";
    public $qty = "";
    public $expiry_date = "";
    #[Rule('image|max:1024')] // 1MB Max
    public $photo;
    #[Rule('image|max:1024')] // 1MB Max
    public $photo_temp;

    public function store()
    {
        $this->validate([
            'name'          => 'required',
            'qty'           => 'required',
            'expiry_date'   => 'required|date',
            'photo_temp'    => 'required|file|mimes:png,jpg,jpeg|max:1024',
        ]);

        // Store Photo
        $image_name = time() . '-' . Str::slug($this->name) . '.' . $this->photo_temp->getClientOriginalExtension();
        $image_link = $this->photo_temp->storeAs('uploads/images', $image_name, 'public');

        Product::create([
            'name' => $this->name,
            'qty' => $this->qty,
            'expiry_date' => $this->expiry_date,
            'photo' => $image_link
        ]);

        $this->dispatch('notify', 'Created ');

        $this->resetForm();
    }

    public function edit(string $id)
    {
        $this->resetForm();
        $data = Product::find($id);

        $this->id           = $data->id;
        $this->name         = $data->name;
        $this->qty          = $data->qty;
        $this->expiry_date  = $data->expiry_date;
        $this->photo        = $data->photo;
    }

    public function update(string $id)
    {
        $this->validate([
            'name'          => 'required',
            'qty'           => 'required',
            'expiry_date'   => 'required|date',
            'photo_temp'    => 'nullable|file|mimes:png,jpg,jpeg|max:1024',
        ]);

        $data = Product::find($id);

        if ($data) {

            if ($this->photo_temp) {

                // Store Photo
                $image_name = time() . '-' . Str::slug($this->name) . '.' . $this->photo_temp->getClientOriginalExtension();
                $image_link = $this->photo_temp->storeAs('uploads/images', $image_name, 'public');

                // Delete Photo
                $this->deleteFile($data->photo);
            } else {
                $image_link = $data->photo;
            }

            $data->update([
                'name' => $this->name,
                'qty' => $this->qty,
                'expiry_date' => $this->expiry_date,
                'photo' => $image_link
            ]);
        }

        $this->dispatch('notify', 'Updete Successfuly');

        $this->resetForm();
    }


    public function delete(string $id)
    {
        $data = Product::find($id);
        $this->deleteFile($data->photo);
        $data->delete();
        $this->resetForm();
    }



    public function deleteFile($file)
    {
        if (isset($file)) {
            try {
                $file_name  = explode("/", $file);
                unlink(storage_path('app/public/uploads/images/') . $file_name[2]);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }


    public function resetForm()
    {
        $this->resetValidation();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.upload-file', [
            'data' => Product::paginate(12)
        ]);
    }
}
