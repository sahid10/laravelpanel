<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\product;
use App\Models\category;
use Livewire\Component;
use Livewire\WithFileUploads;


class Create extends Component
{
    use WithFileUploads;

    public $product_name;
    public $price;
    public $quantity;
    public $category_id;
    public $category = []; // tambahkan properti categories
    public $image;
    
    protected $rules = [
        'product_name' => 'required',
        'price' => 'required',
        'quantity' => 'required',
        'category_id' => 'required|exists:category,id',
        'image' => 'image|max:1024',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function mount()
    {
        $this->category = category::all(); // ambil semua kategori dari database
    }
    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Product') ])]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('public/products');
        }

        Product::create([
            'product_name' => $this->product_name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'category_id' => $this->category_id,
            'image' => $this->image,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.product.create',[
            'category' => $this->category
        ])
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Product') ])]);
    }
}
