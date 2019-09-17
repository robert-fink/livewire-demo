<?php

namespace App\Http\Livewire;

use App\Contracts\WritingsContract;
use App\Writings;
use Livewire\Component;

class WritingsDashboard extends Component
{
    public $title;
    public $entry;

    protected $writings;

    public function render()
    {
        return view('livewire.writings-dashboard', ['writings' => $this->writings]);
    }

    public function mount()
    {
        $this->writings = app()->get(WritingsContract::class)->get();
    }

    public function save()
    {
//        $this->validate([
//            'title' => 'required',
//            'entry' => 'required',
//        ]);

        if (isset($this->title) && isset($this->entry)){

            Writings::create([
                'user_id' => auth()->user()->id,
                'title' => $this->title,
                'entry' => $this->entry,
            ]);

            $this->title = null;
            $this->entry = null;

            $this->refreshWritings();
        }
    }

    public function delete()
    {
        Writings::where('id', request()['actionQueue'][0]['payload']['params'][0])->delete();

        $this->refreshWritings();
    }

    private function refreshWritings()
    {
        $this->writings = app()->get(WritingsContract::class)->get();
    }

}
