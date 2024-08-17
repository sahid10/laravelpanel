<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\product;
use App\Models\category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $product;

    public $product_name;
    public $price;
    public $quantity;
    public $category_id;
    public $category = []; // tambahkan properti categories
    public $image;
    
    protected $rules = [
        'product_name' => 'required',
        'price' => 'required',
        'quantity' => 'quantity',
        'category_id' => 'required',
        'image' => 'image|max:1024',        
    ];

    public function mount(Product $product){
        $this->product = $product;
        $this->product_name = $this->product->product_name;
        $this->price = $this->product->price;
        $this->quantity = $this->product->quantity;
        $this->category_id = $this->product->category_id;
        $this->category = category::all();
        $this->image = $this->product->image;        
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
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('public/products');
        }

        $this->product->update([
            'product_name' => $this->product_name,
            'price' => $this->price,
            'amount' => $this->amount,
            'category_id' => $this->category_id,
            'image' => $this->image,
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
