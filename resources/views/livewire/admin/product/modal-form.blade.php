<!-- Modal -->
<div livewire:ignore.self class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Products</h1>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="storeProduct">

      
      <div class="modal-body">
        <div class="mb-3">
          <label>Product Name</label>
          <input type="text" wire:model.defer="name" class="form-control">
          @error('name')
              <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="mb-3">
          <label>Product Slug</label>
          <input type="text" wire:model.defer="slug" class="form-control">
          @error('slug')
              <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="mb-3">
          <label>Status</label> <br/>
          <input type="checkbox" wire:model.defer="status"/> Checked=Hidden, Un-checked= Visible
          @error('status')
              <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Product Update Modal -->
<div wire:ignore.self class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Products</h1>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div wire:loading class="p-2">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>Loading...
      </div>
        <div wire:loading.remove>
          <form wire:submit.prevent="updateProduct">

          <div class="modal-body">
            <div class="mb-3">
              <label>Product Name</label>
              <input type="text" wire:model.defer="name" class="form-control">
              @error('name')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="mb-3">
              <label>Product Slug</label>
              <input type="text" wire:model.defer="slug" class="form-control">
              @error('slug')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="mb-3">
              <label>Status</label> <br/>
              <input type="checkbox" wire:model.defer="status"/> Checked=Hidden, Un-checked= Visible
              @error('status')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Product Delete Modal -->
<div wire:ignore.self class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Products</h1>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div wire:loading class="p-2">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>Loading...
      </div>
        <div wire:loading.remove>
          <form wire:submit.prevent="destroyProduct">

          <div class="modal-body">
            <h4>Are you sure you want to delete this brand?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>