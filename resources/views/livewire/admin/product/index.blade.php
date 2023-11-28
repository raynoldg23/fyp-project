<div>
    
    @include('livewire.admin.product.modal-form')
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Products List
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addProductModal" class="btn btn-primary btn-sm text-white float-end">Add Products</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-stiped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Slug</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->slug }}</td> 
                                <td>{{ $product->status =='1' ? 'hidden':'visible' }}</td>
                                <td>
                                    <a href="#" wire:click="editProduct({{ $product->id }})" data-bs-toggle="modal" data-bs-target="#updateProductModal" class="btn btn-sm btn-success">Edit</a>
                                    
                                    <a href="#" wire:click="deleteProduct({{ $product->id }})" data-bs-toggle="modal" data-bs-target="#deleteProductModal" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Products Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
  <script>
    window.addEventListener('close-modal', event => {
      $('#addProductModal').modal('hide');
      $('#updateProductModal').modal('hide');
      $('#deleteProductModal').modal('hide');
    });
  </script>
@endpush