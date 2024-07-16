<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $category;

    public $category_name;
    public $description;
    
    protected $rules = [
        'category_name' => 'required',
        'description' => 'required',        
    ];

    public function mount(Category $Category){
        $this->category = $Category;
        $this->category_name = $this->category->category_name;
        $this->description = $this->category->description;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Category') ]) ]);
        
        $this->category->update([
            'category_name' => $this->category_name,
            'description' => $this->description,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.category.update', [
            'category' => $this->category
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Category') ])]);
    }
}
