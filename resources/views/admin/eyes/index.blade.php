@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-12">
    @if (session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="card"></div>
      <div class="card-header" style="height: 3.8rem">
        <h3>Customer Eyes
          <a href="{{ url('admin/eyes/create') }}" class="btn btn-primary btn-sm text-white float-end">Add Customer Eyes Data</a>
        </h3>
      </div>
      <div class="card-body" style="background-color: white">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Customer Name</th>
              <th>SPH</th>
              <th>CYL</th>
              <th>AXIS</th>
              <th>PRISM</th>
              <th>ADD</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($customereyes as $eye)
            <tr>
              <td>{{ $eye->id }}</td>
              <td>
                @if ($eye->customer)
                  {{ $eye->customer->name }}
                @else
                  No Customer
                @endif
              </td>
              <td>{{ $eye->sph }}</td>
              <td>{{ $eye->cyl }}</td>
              <td>{{ $eye->axis }}</td>
              <td>{{ $eye->prism }}</td>
              <td>{{ $eye->add }}</td>
              <td class="d-flex flex-row grid gap-1">
                <a href="{{ url('admin/eyes/'.$eye->id.'/edit') }}" class="btn btn-sm btn-success text-white">Edit</a>

                <form action="{{ route('eyes.destroy', $eye->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                <button class="btn btn-sm btn-danger text-white" type="submit">Delete</button>
                </form>

                <a href="{{ url('admin/eyes/'.$eye->id.'/print') }}" class="btn btn-sm btn-secondary">Print</a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8">No Eye Data Available</td>
            </tr>
            @endforelse
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection