<div>
  <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Customer Delete</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="destroyCustomer">
          <div class="modal-body">
            <h6>Are you sure you want to delete this data?</h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
  
      @if (session('message'))
        
      @endif
      <div class="card"></div>
        <div class="card-header" style="height: 3.8rem">
          <h3>Customer Record
            <a href="{{ url('admin/customer/create') }}" class="btn btn-primary btn-sm float-end text-white">Add Customer</a>
          </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Phone No.</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->age }}</td>
                        <td>{{ $customer->phoneNumber }}</td>
                        <td>{{ $customer->status == '1' ? 'Hidden':'Visible' }}</td>
                        <td>
                            <a href="{{ url('admin/customer/'.$customer->id.'/edit') }}" class="btn text-white btn-success btn-sm">Edit</a>
                            <a href="#" wire:click="deleteCustomer({{ $customer->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger btn-sm text-white">Delete</a>
                            <a href="{{ url('admin/customer/'.$customer->id.'/print') }}" class="btn btn-secondary btn-sm">Print</a>
                            <a href="{{ url('admin/customer/'.$customer->id.'/view') }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $customers->links() }}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@push('script')
  <script>
    window.addEventListener('close-modal', event => {
      $('#deleteModal').modal('hide');
    })
  </script>
@endpush