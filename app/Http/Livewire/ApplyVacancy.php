<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use App\Notifications\NewCandidate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacancy extends Component
{


    use WithFileUploads;

    public $cv;
    public $vacant;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacant $vacant)
    {
        $this->vacant = $vacant;
    }

    public function apply()
    {

        //Store CV on hard drive
        $data = $this->validate();

        $cv = $this->cv->store('public/cv');
        $data['cv'] = str_replace('public/cv/', '', $cv);

        //Create the vacancy
        $this->vacant->candidates()->create([
            'user_id' => auth()->user()->id,
            'cv' => $data['cv'],
        ]);

        //Create the notification and send the email
        $this->vacant->recruiter->notify(new NewCandidate($this->vacant->id, $this->vacant->title, auth()->user()->id));

        //Show the user an OK message
        session()->flash('message', 'Your information was sent correctly. Good luck!');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
