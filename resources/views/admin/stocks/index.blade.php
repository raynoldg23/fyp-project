@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-12">
    @if (session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="card"></div>
      <div class="card-header" style="height: 3.8rem">
        <h3>Purchases
          <a href="{{ url('admin/stocks/create') }}" class="btn btn-primary btn-sm text-white float-end">Add Purchase</a>
        </h3>
      </div>
      <div class="card-body" style="background-color: white">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Customer</th>
              <th>Brand</th>
              <th>Product</th>
              <th>Price (RM)</th>
              <th>Payment Method</th>
              <th>Reference Number</th>
              <th>Quantity</th>
              
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($stocks as $stock)
            <tr>
              <td>{{ $stock->id }}</td>
              <td>
                @if ($stock->customer)
                  {{ $stock->customer->name }}
                @else
                  No Customer
                @endif
              </td>
              <td>{{ $stock->product }}</td>
              <td>{{ $stock->name }}</td>
              <td>{{ $stock->selling_price }}</td>
              <td>{{ $stock->small_description }}</td>
              <td>{{ $stock->description }}</td>
              <td>{{ $stock->quantity }}</td>
              
              <td>
                <a href="{{ url('admin/stocks/'.$stock->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                <a href="{{ url('admin/stocks/'.$stock->id.'/print') }}" class="btn btn-sm btn-secondary">Print</a>
                <a href="" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7">No Stock Available</td>
            </tr>
            @endforelse
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection