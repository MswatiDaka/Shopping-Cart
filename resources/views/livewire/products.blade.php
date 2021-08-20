<div>
    <div>
        <form wire:submit.prevent='add_product'>
            <input type='text' wire:model='name' placeholder="Shoes">
            <input type='number' wire:model='price' placeholder='K00.0'>
            <button >Create Product</button>
        </form>
    </div>
    <div>
    <table>
                <thead>
                    <tr>
                        <th >No.</th>
                        <th >Name</th>
                        <th >Price</th>
                        
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td >{{ $product->id }}</td>
                        <td >{{ $product->name }}</td>
                        <td >{{ $product->price}}</td>
                        
                        <td >
                            <button wire:click="edit({{ $product->id }})">Edit</button>
                            <button wire:click ="delete( {{ $product->id }} )">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
</div>