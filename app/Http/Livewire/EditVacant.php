<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use App\Models\Vacant;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class EditVacant extends Component
{

    public $vacant_id;
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;
    public $new_image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'new_image' => 'nullable|image|max:1024'
    ];


    public function mount(Vacant $vacant)
    {
        $this->vacant_id = $vacant->id;
        $this->title = $vacant->title;
        $this->salary = $vacant->salary_id;
        $this->category = $vacant->category_id;
        $this->company = $vacant->company;
        $this->last_day = Carbon::parse($vacant->last_day)->format('Y-m-d');
        $this->description = $vacant->description;
        $this->image = $vacant->image;
    }

    public function editVacant()
    {
        $data = $this->validate();

        // If there is a new image
        if ($this->new_image) {
            $image = $this->new_image->store('public/vacants');
            $data['image'] = str_replace('public/vacants/', '', $image);
        }

        //Find the vacancy to edit
        $vacant = Vacant::find($this->vacant_id);

        //Assign the values
        $vacant->title = $data['title'];
        $vacant->salary_id = $data['salary'];
        $vacant->category_id = $data['category'];
        $vacant->company = $data['company'];
        $vacant->last_day = $data['last_day'];
        $vacant->description = $data['description'];
        $vacant->image = $data['image'] ?? $vacant->image;

        //Save the vacancy
        $vacant->save();

        //Redirect
        session()->flash('message', 'The vacancy was successfully updated');

        return redirect()->route('vacants.index');
    }

    public function render()
    {

        //Query DB
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.edit-vacant', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
