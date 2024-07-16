<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $product;

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

    public function mount(Product $Product){
        $this->product = $Product;
        $this->product_name = $this->product->product_name;
        $this->price = $this->product->price;
        $this->amount = $this->product->amount;
        $this->description = $this->product->description;
        $this->category = $this->product->category;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Product') ]) ]);
        
        $this->product->update([
            'product_name' => $this->product_name,
            'price' => $this->price,
            'amount' => $this->amount,
            'description' => $this->description,
            'category' => $this->category,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.product.update', [
            'product' => $this->product
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Product') ])]);
    }
}
