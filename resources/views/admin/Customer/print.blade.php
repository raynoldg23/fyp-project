<form action="{{ url('admin/eyes/'.$customer->id) }}" method="get" enctype="multipart/form-data">
    <style>
        #invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 100mm;
  background: #FFF;
  
  
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
 
#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}

#top{min-height: 100px;}
#mid{min-height: 80px;} 
#bot{ min-height: 50px;}

#top .logo{
  //float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
	background-size: 60px 60px;
}
.clientlogo{
  float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
	background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  display: block;
  //float:left;
  margin-left: 0;
}
.title{
  float: right;
}
.title p{
    text-align: right;
} 
table{
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #222;
}
td{
  padding: 5px 0 5px 15px;
  border: 1px solid #EEE;
}
.tabletitle{
  padding: 5px;
  font-size: .5em;
  background: #EEE;
}
.service{border-bottom: 1px solid #EEE;}
.item{width: 24mm;}
.itemtext{font-size: .5em;}

#legalcopy{
  margin-top: 5mm;
}

  
  
}
    </style>
    <div id="invoice-POS">    
        <center id="top">
          <div class="logo"></div>
          <div class="info"> 
            <h2>VisionTECH SDN BHD</h2>
          </div><!--End Info-->
        </center><!--End InvoiceTop-->
        
        <div id="mid">
          <div class="info">
            <h2>Contact Info</h2>
            <p> 
                Address : 25, Jalan PDR 5, Kawasan Perniagaan Desa Ria Balakong, 43300 Seri Kembangan, Selangor</br>
                Phone   : +011-11915378</br>
            </p>
          </div>
        </div><!--End Invoice Mid-->
        
        <div id="bot">
    
                        <div id="table">
                            <table>
                                <tr class="tabletitle">
                                    <td class="item"><h2>Item</h2></td>
                                    <td class="Rate"><h2>Sub Total</h2></td>
                                </tr>
                                
                                <tr class="service">
                                    <td class="tableitem"><p class="itemtext">ID</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $customer->id }}</p></td>
                                </tr>

                                <tr class="service">
                                    <td class="tableitem"><p class="itemtext">Name</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $customer->name }}</p></td>
                                </tr>
    
                                <tr class="service">
                                    <td class="tableitem"><p class="itemtext">Age</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $customer->age }}</p></td>
                                </tr>
    
                                <tr class="service">
                                    <td class="tableitem"><p class="itemtext">Phone Number</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $customer->phoneNumber }}</p></td>
                                </tr>
                            </table>
                        </div><!--End Table-->

                    </div><!--End InvoiceBot-->
      </div><!--End Invoice-->
</form>