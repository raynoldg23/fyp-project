<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerEyesFormRequest;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRecordRequest;
use App\Models\CustomerRecord;
use App\Models\Eye;
use Illuminate\Support\Facades\File;

use Pdf;



class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.customer.index');
    }
    
    public function create()
    {
        
        return view('admin.customer.create');
    }

    public function store(CustomerRecordRequest $request)
    {
        $validatedData = $request->validated();

        $customer = new CustomerRecord;
        
        $customer->name = $validatedData['name'];
        $customer->age = $validatedData['age'];
        $customer->phoneNumber = $validatedData['phoneNumber'];
        $customer->status = $request->status == true ? '1':'0';
        $customer->save();

        return redirect('admin/customer')->with('Message', 'Customer Record Inserted Successfully');
    }

    public function edit(CustomerRecord $customer)
    {
       return view ('admin.customer.edit', compact('customer'));
    }

    public function print($customer)
    {
        
        // retreive all records from db.
        $customer = CustomerRecord::findOrFail($customer);
        return view('admin.customer.print', compact('customer'));
    }

    public function update(CustomerRecordRequest $request, $customer)
    {
        $validatedData = $request->validated();

        $customer = CustomerRecord::findOrFail($customer);

        $customer = new CustomerRecord;
        $customer->name = $validatedData['name'];
        $customer->age = $validatedData['age'];
        $customer->phoneNumber = $validatedData['phoneNumber'];
        $customer->status = $request->status == true ? '1':'0';
        $customer->update();

        return redirect('admin/customer')->with('Message', 'Customer Record Updated Successfully');
    }

    public function view(CustomerRecord $customer)
    {
        
        
        return view('admin.customer.view', compact('customer'));
    }
}
