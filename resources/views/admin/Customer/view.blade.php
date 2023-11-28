@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card"></div>
      <div class="card-header" style="height: 3.8rem">
        <h3>Add Customer Record
          <a href="{{ url('admin/customer') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
        </h3>
      </div>
        <div class="card-body" style="background-color: white">
          <form action="{{ url('admin/customer'.$customer->id) }}" method="get" enctype="multipart/form-data">
            @csrf

            

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>ID</label>
                <h3>{{ $customer->id }}</h3>
              </div>

              <div class="col-md-6 mb-3">
                <label>Name</label>
                <h3>{{ $customer->name }}</h3>
              </div>
              
              <div class="col-md-6 mb-3">
                <label>Age</label>
                <h3>{{ $customer->age }}</h3>
              </div>
              <div class="col-md-6 mb-3">
                <label>Receipt Number</label>
                <h3>{{ $customer->phoneNumber }}</h3>
              </div>
              <div class="col-md-6 mb-3">
                <label>Status</label><br>
                <h3>{{ $customer->status }}</h3>
              </div>
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection