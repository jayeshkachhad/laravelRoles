<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware(['permission:product-list|product-create|product-edit|product-delete'], ["only" => ["index", "show"]]);
        $this->middleware(['permission:product-create'], ["only" => ["create", "store"]]);
        $this->middleware(['permission:product-edit'], ["only" => ["edit", "update"]]);
        $this->middleware(['permission:product-delete'], ["only" => ["destroy"]]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required"
        ]);

        product::create([
            "name" => $request->name
        ]);

        return redirect()->route('products.index')->with("success", "New product Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = product::find($id);
        return view('products.show', compact('product'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required"
        ]);

        $product = product::find($id);

        $product->name = $request->name;
        $product->save();

        return redirect()->route('products.index')->with("success", "Product Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = product::find($id);
        $product->delete();

        return redirect()->route('products.index')->with("success", "product Deleted Done");
    }
}
