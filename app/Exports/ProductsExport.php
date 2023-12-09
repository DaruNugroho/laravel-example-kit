<?php

namespace App\Exports;

use App\Models\Product;
use Generator;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromGenerator;

class ProductsExport implements FromGenerator
{
    use Exportable;


    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function generator(): Generator
    {
        // yield ['No / ' . $this->id, 'Name', 'QTY'];
        // for ($i = 1; $i <= 100; $i++) {
        //     yield [$i, $i + 1, $i + 2];
        // }

        $products = Product::get();
        yield ['No / ' . $this->id, 'Name', 'QTY'];
        foreach ($products as $i => $item) {
            yield [$i + 1, $item->name, $item->qty];
        }
    }
}
