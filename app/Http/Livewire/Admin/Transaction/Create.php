<?php

namespace App\Http\Livewire\Admin\Transaction;

use App\Models\transaction;
use App\Models\User;
use App\Models\product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $quantity;
    public $total_price;
    public $status;
    public $product_id;
    public $product=[];
    
    protected $rules = [
        'quantity' => 'required|integer|min:1',
        'total_price' => 'required|numeric|min:0',
        'status' => 'required',
        'product_id' => 'required',           
    ];

    public function mount()
    {
        $this->product = product::all(); // ambil semua kategori dari database
    }

    public function updated($propertyName)
{
    // Melakukan validasi hanya pada input yang diperbarui
    $this->validateOnly($propertyName);

    // Menghitung total harga jika properti 'quantity' atau 'product_id' diperbarui
    if ($propertyName === 'quantity' || $propertyName === 'product_id') {
        $this->calculateTotalPrice();
    }
}


    public function calculateTotalPrice()
    {
        $product = Product::find($this->product_id);

        if ($product) {
            $this->total_price = $this->quantity * $product->price;
        } else {
            $this->total_price = 0;
        }
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Transaction') ])]);
        
        transaction::create([
            'user_id' => auth()->id(),  
            'product_id' => $this->product_id,       
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'status' => $this->status,             
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.transaction.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Transaction') ])]);
    }
}
