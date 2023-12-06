<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Crud extends Component
{
    public array $breadcrumb = [
        ['lable' => 'Home', 'link' => '/livewire/home'],
        ['lable' => 'Basic Crud', 'link' => '#']
    ];

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

        // // Method 1
        // Product::create(
        //     $this->only(['name', 'qty', 'expiry_date'])
        // );

        // // Method 2
        // Product::create([
        //     'name'          => $this->name,
        //     'qty'           => $this->qty,
        //     'expiry_date'   => $this->expiry_date,
        // ]);

        // Method 3
        $product = new Product;
        $product->name  = $this->name;
        $product->qty   = $this->qty;
        if ($this->expiry_date) {
            $product->expiry_date = $this->expiry_date;
        }
        $product->save();


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

        $this->resetForm();
    }


    public function delete(string $id)
    {
        $data = Product::find($id);
        $data->delete();

        $this->resetForm();
    }




    public function resetForm()
    {
        $this->resetValidation();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.crud', [
            'data' => Product::paginate(12)
        ]);
    }
}
