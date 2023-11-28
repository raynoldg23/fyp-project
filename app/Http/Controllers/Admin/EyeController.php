<?php

namespace App\Http\Controllers\Admin;

use AddCustomereyeTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerEyesFormRequest;
use App\Http\Requests\CustomerRecordRequest;
use App\Models\CustomerRecord;
use App\Models\Eye;
use Illuminate\Http\Request;

class EyeController extends Controller
{
    public function index()
    {
        $customereyes = Eye::all();
        $customers = CustomerRecord::all();
        return view('admin.eyes.index', compact('customereyes'));
    }

    public function create()
    {
        $customereyes = Eye::all();
        $customers = CustomerRecord::all();
        return view('admin.eyes.create', compact('customereyes' , 'customers'));
    }

    public function store(CustomerEyesFormRequest $request)
    {
        $validatedData = $request->validated();

        $customers = CustomerRecord::findOrFail($validatedData['customer_id']);
        $customereyes = $customers->customereyes()->create([
            'customer_id' => $validatedData['customer_id'],
            'sph' => $validatedData['sph'],
            'cyl' => $validatedData['cyl'],
            'axis' => $validatedData['axis'],
            'prism' => $validatedData['prism'],
            'add' => $validatedData['add']
        ]);

        return redirect('/admin/eyes')->with('message', 'Eye Data Added Successfully');
    }

    public function print($eye_id)
    {
        $customereyes = Eye::findOrFail($eye_id);
        $customers = CustomerRecord::all();
        return view('admin.eyes.print', compact('customereyes', 'customers'));
    }

    public function destroy($eye_id)
    {
        $customereyes = Eye::findOrFail($eye_id);
        $customers = CustomerRecord::all();
        $customereyes->delete();

        return redirect('/admin/eyes')->with('message', 'Eye Data Delete Successfully');
    }

    public function edit($eye_id)
    {
        $customereyes = Eye::findOrFail($eye_id);
        $customers = CustomerRecord::all();
        return view('admin.eyes.edit', compact('customereyes', 'customers'));
    }

    public function update(CustomerEyesFormRequest $request, $customers)
    {
        $validatedData = $request->validated();

        $customers = CustomerRecord::findOrFail($validatedData['customer_id']);
        $customereyes = $customers->customereyes()->update([
            'customer_id' => $validatedData['customer_id'],
            'sph' => $validatedData['sph'],
            'cyl' => $validatedData['cyl'],
            'axis' => $validatedData['axis'],
            'prism' => $validatedData['prism'],
            'add' => $validatedData['add']
        ]);

        return redirect('/admin/eyes')->with('message', 'Eye Update Added Successfully');
    }
}
