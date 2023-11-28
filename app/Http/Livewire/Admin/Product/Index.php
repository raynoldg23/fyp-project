<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status, $product_id;

    //public function rules()
    //{
    //    return[
    //        'name' => 'required|string',
     //       'slug' => 'required|string',
     //       'status' => 'nullable'
    //    ];
    //}

    protected $rules = [
        'name' => 'required|string',
        'slug' => 'required|string',
        'status' => 'nullable',
    ];

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->product_id = NULL;

    }

    public function storeProduct()
    {
       $validatedData = $this->validate();
       Product::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
       ]);
       session()->flash('message', 'Product Added Successfully');
       $this->dispatchBrowserEvent('close-modal');
       $this->resetInput();
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function editProduct(int $product_id)
    {
        $this->product_id = $product_id;
        $products = Product::findOrFail($product_id);
        $this->name = $products->name;
        $this->slug = $products->slug;
        $this->status = $products->status;
    }

    public function updateProduct()
    {
        $validatedData = $this->validate();
        Product::findOrFail($this->product_id)->update([
                'name' => $this->name,
                'slug' => Str::slug($this->slug),
                'status' => $this->status == true ? '1':'0',
        ]);
        session()->flash('message', 'Product Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteProduct($product_id)
    {
        $this->product_id = $product_id;
    }

    public function destroyProduct()
    {
        Product::findOrFail($this->product_id)->delete();
        session()->flash('message', 'Product Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function render()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.product.index', ['products' => $products])
                    ->extends('layouts.admin')
                    ->section('content');
    }
}
