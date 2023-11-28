<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerRecord;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Requests\StockFormRequest;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        $customers = CustomerRecord::all();
        return view('admin.stocks.index', compact('stocks'));
    }

    public function create()
    {
        $customers = CustomerRecord::all();
        $products = Product::all();
        return view('admin.stocks.create', compact('customers', 'products'));
    }

    public function store(StockFormRequest $request)
    {
        $validatedData = $request->validated();

        $customers = CustomerRecord::findOrFail($validatedData['customer_id']);
        $stock = $customers->stocks()->create([
            'customer_id' => $validatedData['customer_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'product' => $validatedData['product'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description']
        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/stocks/';

            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.'-'.$filename;

                $stock->stockImages()->create([
                    'customer_id' => $customers->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        
        return redirect('/admin/stocks')->with('message', 'Stock Added Successfully');
    }

    public function edit(int $stock_id)
    {
        $customers = CustomerRecord::all();
        $products = Product::all();
        $stock = Stock::findOrFail($stock_id);
        return view('admin.stocks.edit', compact('customers','products','stock'));
    }

    public function update(StockFormRequest $request, $customers)
    {
        $validatedData = $request->validated();

        $customers = CustomerRecord::findOrFail($validatedData['customer_id']);
        $stock = $customers->stocks()->update([
            'customer_id' => $validatedData['customer_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'product' => $validatedData['product'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description']
        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/stocks/';

            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.'-'.$filename;

                $stock->stockImages()->update([
                    'customer_id' => $customers->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        
        return redirect('/admin/stocks')->with('message', 'Stock Update Successfully');
    }

    public function print($stock_id)
    {
        $customers = CustomerRecord::all();
        $products = Product::all();
        $stock = Stock::findOrFail($stock_id);
        return view('admin.stocks.print', compact('stock','customers','products'));
    }
}
