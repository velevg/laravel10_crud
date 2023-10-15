<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        $product = Product::paginate(15);
        $product = Product::orderBy('created_at', 'DESC')->get();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('picture')) {
            $fileName = time() . '.' . $request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('pics'), $fileName);
            $request->merge(['file_name' => $fileName]);
        }
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|integer|between:0,10000',
            'product_code' => 'required|max:255',
            'description' => 'required|max:255',
            'file_name' => 'required|max:255',
        ]);
        Product::create($validateData);
        return redirect()->route('product.index')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasFile('picture')) {
            $fileName = time() . '.' . $request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('pics'), $fileName);
            $request->merge(['file_name' => $fileName]);
        }
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('product.index')->with('success', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'product deleted successfully');
    }
}
