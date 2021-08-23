<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use App\Models\User;

class Products extends Component
{
    public $name;
    public $price;
    public $products;
    public $product_id;
    public $isOpen=0;

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products');
    }

    // public function test_live_wire() {
    //     var_dump($this);
    //     dd($this);
    // }

    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->name = '';
        $this->price = '';
    }

    public function create()
    {
        $this->resetInputFields();
    }

    public function add_product(){
        
        $data = $this->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        
        // var_dump('data...');

        // $product =Product::updateOrCreate(['name'=>$this->name, 'price'=>$this->price]);
        // $product = Product::updateOrCreate($data);
        // dd($product);

        Product::updateOrCreate(['id' => $this->product_id], [
            'name' => $this->name,
            'price' => $this->price
        ]);

        $user = User::find(1);
        foreach($user->products as $product){
            echo $product->name;
        }
        $this->create();
        $this->closeModal();
        // dd($this);

    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $product->name;
        $this->price = $product->price;

        $this->openModal();
    }
    
    public function delete($id){
        

    
            Product::find($id)->delete();
            // dd($this);
            session()->flash('message', 'Product Deleted Successfully.');

    }
}
