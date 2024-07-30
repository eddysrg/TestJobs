<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class FilterVacancies extends Component
{

    public $term;
    public $category;
    public $salary;

    public function readFormData()
    {
        $this->emitUp('searchTerms', $this->term, $this->category, $this->salary);
    }

    public function render()
    {

        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.filter-vacancies', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
