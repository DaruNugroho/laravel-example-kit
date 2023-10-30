<?php

namespace App\Livewire;

use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class CrudDialog extends Component
{

    public $id = "";
    public $name = "";
    public $qty = "";
    public $expiry_date = "";


    public function store()
    {
        $this->validate([
            'name'          => 'required',
            'qty'           => 'required',
            'expiry_date'   => 'required|date',
        ]);

        Product::create([
            'name' => $this->name,
            'qty' => $this->qty,
            'expiry_date' => $this->expiry_date,
        ]);

        $this->dispatch('notify', 'Created & Successfuly');

        $this->resetForm();
    }


    public function edit(string $id)
    {
        $data = Product::find($id);

        $this->id         = $data->id;
        $this->name         = $data->name;
        $this->qty          = $data->qty;
        $this->expiry_date  = $data->expiry_date;
    }


    public function update(string $id)
    {
        $data = Product::find($id);
        if ($data) {
            $data->update([
                'name' => $this->name,
                'qty' => $this->qty,
                'expiry_date' => $this->expiry_date,
            ]);
        }

        $this->dispatch('notify', 'Updete Successfuly');

        $this->resetForm();
    }


    public function delete(string $id)
    {
        $data = Product::find($id);
        $data->delete();

        $this->dispatch('notify', 'Deleted !');

        $this->resetForm();
    }


    public function create()
    {
        $this->resetValidation();
        $this->reset();
    }

    public function resetForm()
    {
        $this->resetValidation();
        $this->reset();
        $this->dispatch('closeDialog', 'dialogForm');
    }


    public function mount()
    {
        $this->expiry_date = Carbon::now();
    }

    public function render()
    {
        return view('livewire.crud-dialog', [
            'data' => Product::paginate(12)
        ]);
    }
}
