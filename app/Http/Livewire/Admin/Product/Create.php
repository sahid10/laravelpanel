<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $product_name;
    public $price;
    public $amount;
    public $description;
    public $category;
    
    protected $rules = [
        'product_name' => 'required',
        'price' => 'required',
        'amount' => 'required',
        'description' => 'required',
        'category' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Product') ])]);
        
        Product::create([
            'product_name' => $this->product_name,
            'price' => $this->price,
            'amount' => $this->amount,
            'description' => $this->description,
            'category' => $this->category,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.product.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Product') ])]);
    }
}
