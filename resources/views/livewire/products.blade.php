<div>
    <div>
        <form wire:submit.prevent='add_product'>
            <input type='text' wire:model='name' placeholder="Shoes">
            <input type='number' wire:model='price' placeholder='K00.0'>
            <button class="my-4 inline-flex justify-center w-100 rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700" >
                Create Product</button>
        </form>
    </div>
    @if($isOpen)
                @include('livewire.create')
            @endif
    <div>
    <table class="table-fixed w-full">
                <thead  class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($products as $product)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->price}}</td>
                        
                        <td class="justify-center px-6 py-4 whitespace-nowrap">
                            <button wire:click="edit({{ $product->id }})" scope= "col" class="w-20 px-2 py-1 bg-gray-500 text-gray-900 cursor-pointer">Edit</button>
                            <button wire:click ="delete( {{ $product->id }} )" scope= "col" class="w-20 px-2 py-1 bg-red-100 text-gray-900 cursor-pointer">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
</div>