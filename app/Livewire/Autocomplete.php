<?php

namespace App\Livewire;

use App\Models\Country;
use Livewire\Component;

class Autocomplete extends Component
{

    public $countries = [];
    public $country = "";
    public $code = "";
    public $showdiv = false;
    public $showresult = false;

    // Fetch records
    public function searchCountry()
    {
        if (!empty($this->country) && strlen($this->country) > 1) {
            $this->countries = Country::orderby('name', 'asc')
                ->select('*')
                ->where('name', 'like', '%' . $this->country . '%')
                ->limit(5)
                ->get();
            $this->showdiv = true;
            $this->showresult = true;
        } else {
            $this->showdiv = false;
            $this->showresult = false;
        }
    }


    public function setCountry($code, $name)
    {
        $this->country = $name;
        $this->code = $code;
        $this->showdiv = false;
        $this->showresult = false;
    }

    public function clearCountry()
    {
        $this->country = "";
        $this->code = "";
    }


    public function render()
    {
        return view('livewire.autocomplete');
    }
}
