<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $name;
    public $price;
    public $products;
    public $product_id;

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products');
    }

    public function test_live_wire() {
        var_dump($this);
        dd($this);
    }

    public function add_product(){
        
        $data = $this->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        var_dump('data...');

        // Product::create(['name'=>$this->name, 'price'=>$this->price]);
        $product = Product::create($data);
        // dd($product);
        dd($this);

    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $product->name;
        $this->price = $product->price;
    }
    
    public function delete($id){
        

    
            Product::find($id)->delete();
            dd($this);

    }
}
