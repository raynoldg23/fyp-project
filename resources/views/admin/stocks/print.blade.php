<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Receipt</title>
    <style>
      /* Style the receipt */
      .receipt {
        border: 1px solid #ccc;
        padding: 10px;
        width: 300px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        line-height: 1.0;
        
      }
      
      /* Style the header of the receipt */
      .receipt-header {
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        margin-bottom: 10px;
      }
      
      /* Style the items in the receipt */
      .receipt-item {
        margin-bottom: 10px;
      }
      
      /* Style the footer of the receipt */
      .receipt-footer {
        margin-top: 10px;
        border-top: 1px solid #ccc;
        padding-top: 10px;
        text-align: right;
      }
    </style>
  </head>

  <body>
    <form action="{{ url('admin/eyes/'.$stock->id) }}" method="get" enctype="multipart/form-data">
    <div class="receipt">
      <div class="receipt-header">
        <center><h2>VISIONTECH sdn bhd</h2></center>
        <h2>Payment Receipt</h2>
        <p>Name: <span class="receipt-date">{{ $stock->customer->name }}</span></p>
        
      </div>
      
      <div class="receipt-item">
        <h3>Brand</h3>
        <p>{{ $stock->product }}</p>
      </div>
      
      <div class="receipt-item">
        <h3>Product</h3>
        <p>{{ $stock->name }}</p>
      </div>
      
      <div class="receipt-item">
        <h3>Price</h3>
        <p>{{ $stock->selling_price }}</p>
      </div>

      <div class="receipt-item">
        <h3>Payment Method</h3>
        <p>{{ $stock->small_description }}</p>
      </div>

      <div class="receipt-item">
        <h3>Reference Number</h3>
        <p>{{ $stock->description }}</p>
      </div>

      <div class="receipt-item">
        <h3>Quantity</h3>
        <p>{{ $stock->quantity }}</p>
      </div>

      <div class="receipt-footer">
        <p>Receipt Issued by: <span>{{ Auth::user()->name }}</span></p>
      </div>

    </div>
  </form>
  </body>