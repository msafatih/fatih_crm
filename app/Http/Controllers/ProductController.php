<?php
tes
namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!Auth::user()->role === 'admin' || !Auth::user()->role === 'manager') {
            return redirect()->route('dashboard.index');
        } else {
            $products = Product::all();

            return view('dashboard.products.index', compact('products',));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!Auth::user()->role === 'admin' || !Auth::user()->role === 'manager') {
            return redirect()->route('products.index');
        }
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
        $validatedData = $request->validated();

        try {
            Product::create($validatedData);

            return redirect()
                ->route('products.index')
                ->with('success', 'Product berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan product. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        if (!Auth::user()->role === 'admin' || !Auth::user()->role === 'manager') {
            return redirect()->route('products.index');
        }

        return view('dashboard.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
        $validatedData = $request->validated();
        try {
            $product->update($validatedData);

            return redirect()
                ->route('products.index')
                ->with('success', 'Product berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui product. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        try {
            $product->delete();

            return redirect()
                ->route('products.index')
                ->with('success', 'Product berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat menghapus product. Silakan coba lagi.');
        }
    }
}
