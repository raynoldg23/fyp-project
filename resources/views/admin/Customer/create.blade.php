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
          <form action="{{ url('admin/customer') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control"/>
              </div>
              
              <div class="col-md-6 mb-3">
                <label>Age</label>
                <input type="text" name="age" class="form-control"/>
              </div>
              <div class="col-md-6 mb-3">
                <label>Phone Number</label>
                <input type="text" name="phoneNumber" class="form-control"/>
              </div>
              <div class="col-md-6 mb-3">
                <label>Status</label><br>
                <input type="checkbox" name="status"/>
              </div>
                
              <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary float-end text-white">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection