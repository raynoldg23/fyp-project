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
    <form action="{{ url('admin/eyes/'.$customereyes->id) }}" method="get" enctype="multipart/form-data">
    <div class="receipt">
      <div class="receipt-header">
        <center><h2>VISIONTECH</h2></center>
        <h2>Eye Result</h2>
        <p>Name: <span class="receipt-date">{{ $customereyes->customer->name }}</span></p>
        
      </div>
      
      <div class="receipt-item">
        <h3>SPH</h3>
        <p>{{ $customereyes->sph }}</p>
      </div>
      
      <div class="receipt-item">
        <h3>CYL</h3>
        <p>{{ $customereyes->cyl }}</p>
      </div>
      
      <div class="receipt-item">
        <h3>AXIS</h3>
        <p>{{ $customereyes->axis }}</p>
      </div>

      <div class="receipt-item">
        <h3>PRISM</h3>
        <p>{{ $customereyes->prism }}</p>
      </div>

      <div class="receipt-item">
        <h3>ADD</h3>
        <p>{{ $customereyes->add }}</p>
      </div>

      <div class="receipt-footer">
        <p>Printed by: <span>{{ Auth::user()->name }}</span></p>
      </div>

    </div>
  </form>
  </body>
</html>

