@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card"></div>
      <div class="card-header" style="height: 3rem">
        <h3>Add Purchase
          <a href="{{ url('admin/stocks') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
        </h3>
      </div>
      <div class="card-body" style="background-color: white">

        @if ($errors->any())
          <div class="alert alert-warning">
            @foreach ($errors->all() as $error )
              <div>{{ $error }}</div>
            @endforeach
          </div>
        @endif

        <form action="{{ url('admin/stocks') }}" method="POST" enctype="multipart/form-data">
          @csrf
          

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
              Home
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
              SEO Tags
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
              Details
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
              Product Image
            </button>
          </li>
          
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="mb-3">
              <label>Customer</label>
              <select name="customer_id" class="form-control">
                @foreach ($customers as $customer)
                  
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label>Product Name</label>
              <input type="text" name="name" class="form-control"/>
            </div>
            <div class="mb-3">
              <label>Product Slug Name</label>
              <input type="text" name="slug" class="form-control"/>
            </div>
            <div class="mb-3">
              <label>Select Brand</label>
              <select name="product" class="form-control">
                @foreach ($products as $product)
                  
                <option value="{{ $product->name }}">{{ $product->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label>Payment Method</label>
              <select name="small_description" class="form-control">
                <option value="cash">Cash</option>
                <option value="online_payment">Online Payment</option>
                <option value="qr_code">QR Code</option>
              </select>
            </div>
            <div class="mb-3">
              <label>Reference Number (Online Payment & QR Code)</label>
              <textarea name="description" class="form-control" cols="30" rows="1"></textarea>
            </div>
          </div>
          <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
            <div class="mb-3">
              <label>Meta Title</label>
              <input type="text" name="meta_title" class="form-control"/>
            </div>
            <div class="mb-3">
              <label>Meta Description</label>
              <textarea name="meta_description" class="form-control" cols="30" rows="4"></textarea>
            </div>
            <div class="mb-3">
              <label>Meta Keyword</label>
              <textarea name="meta_keyword" class="form-control" cols="30" rows="4"></textarea>
            </div>
          </div>

          <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
            <div class="mb-3">
              <div class="row">
                <div class="col-md-4">
                  <div class="mb-3">
                    <label>Original Price</label>
                    <input type="text" name="original_price" class="form-control"/>
                  </div>
                  <div class="mb-3">
                    <label>Selling Price</label>
                    <input type="text" name="selling_price" class="form-control"/>
                  </div>
                  <div class="mb-3">
                    <label>Quantity</label>
                    <input type="text" name="quantity" class="form-control"/>
                  </div>
                  
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label>Status</label>
                      <input type="checkbox" name="status" class="form-control" style="width: 50px; height: 50px;"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
            <div class="mb-3">
              <label>Upload Product Images</label>
              <input type="file" name="image[]" multiple class="form-control"/>
            </div>
          </div>
          
        </div>
          <div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>

@endsection