<?php

namespace App\Livewire;

use App\Models\Product;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Dompdf extends Component
{
    public array $breadcrumb = [
        ['lable' => 'Home', 'link' => '/livewire/home'],
        ['lable' => 'Basic Crud', 'link' => '#']
    ];

    public function render()
    {
        return view('livewire.dompdf');
    }

    public function downloadPDF()
    {
        $product = Product::all();

        // $pdf = PDF::loadview('product_pdf', ['product' => $product]);
        // return $pdf->download('report-product-pdf');


        // return response()->streamDownload(function () {
        //     $pdf = App::make('dompdf.wrapper');
        //     $pdf->loadHTML('<h1>Test</h1>');
        //     echo $pdf->stream();
        // }, 'test.pdf');

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('product_pdf');
        return $pdf->stream();
    }
}
