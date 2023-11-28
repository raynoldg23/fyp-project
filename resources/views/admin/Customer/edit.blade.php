@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card"></div>
      <div class="card-header" style="height: 3.8rem">
        <h3>Edit Customer
          <a href="{{ url('admin/customer') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
        </h3>
      </div>
        <div class="card-body" style="background-color: white">
          <form action="{{ url('admin/customer/'.$customer->id) }}" method="POST" enctype="multipart/form-data">
            
            @method('PUT')
            @csrf

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ $customer->name }}" class="form-control"/>
              </div>
              
              <div class="col-md-6 mb-3">
                <label>Age</label>
                <input type="text" name="age" value="{{ $customer->age }}" class="form-control"/>
              </div>
              <div class="col-md-6 mb-3">
                <label>Phone Number</label>
                <input type="text" name="phoneNumber" value="{{ $customer->phoneNumber }}" class="form-control"/>
              </div>
              <div class="col-md-6 mb-3">
                <label>Status</label><br>
                <input type="checkbox" name="status" value="{{ $customer->status == "1" ? 'checked':'0' }}"/>
              </div>
              
              
              <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary float-end">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection