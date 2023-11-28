@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card"></div>
      <div class="card-header" style="height: 3.8rem">
        <h3>Add Customer Eye Record
          <button onclick="history.go(-1);" type="button" class="btn-close float-end" aria-label="Close"></button>
        </h3>
      </div>
        <div class="card-body" style="background-color: white">
          <form action="{{ url('admin/eyes') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Name</label>
                <select class="form-select" name="customer_id" id="floatingSelect">
                  <option selected>-- Select Customer --</option>
                  @foreach ($customers as $customer)
                  
                  <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                  @endforeach
                </select>
              </div>
              
              <div class="col-md-6 mb-3">
                <label>SPH</label>
                <input type="text" name="sph" class="form-control"/>
              </div>
              <div class="col-md-6 mb-3">
                <label>CYL</label>
                <input type="text" name="cyl" class="form-control"/>
              </div>
              <div class="col-md-6 mb-3">
                <label>AXIS</label>
                <input type="text" name="axis" class="form-control"/>
              </div>
              <div class="col-md-6 mb-3">
                <label>PRISM</label>
                <input type="text" name="prism" class="form-control"/>
              </div>
              <div class="col-md-6 mb-3">
                <label>ADD</label>
                <input type="text" name="add" class="form-control"/>
              </div>
              <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary text-white float-end">Save</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection