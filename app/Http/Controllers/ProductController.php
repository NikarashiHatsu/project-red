<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'nama_produk' => ['required', 'string'],
            'harga_produk' => ['required', 'integer'],
            'deskripsi_produk' => ['required', 'string'],
            'foto_produk_path' => ['required', 'image', 'mimes:jpeg,jpg,png,bmp', 'max:2048'],
        ]);
        
        // Upload file
        $user_id = Auth::user()->id;
        $newFileName = Str::random(50) . '.' . $request->file('foto_produk_path')->getClientOriginalExtension();
        $foto_produk_path = $request->file('foto_produk_path')->storeAs('public/produk_toko/' . $user_id, $newFileName);

        // Store ke database
        $product = new Product;
        $product->user_id = $user_id;
        $product->nama_produk = $request->nama_produk;
        $product->harga_produk = $request->harga_produk;
        $product->deskripsi_produk = $request->deskripsi_produk;
        $product->foto_produk_path = $foto_produk_path; 
        $product->save();

        // Kembali ke halaman sebelumnya
        return redirect()
            ->back()
            ->with('data', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_produk' => ['required', 'string'],
            'harga_produk' => ['required', 'integer'],
            'deskripsi_produk' => ['required', 'string'],
        ]);

        $product = Product::find($request->id);

        if($request->hasFile('foto_produk_path')) {
            // Validasi
            $request->validate([
                'foto_produk_path' => ['image', 'max:2048', 'mimes:jpeg,jpg,png,bmp']
            ]);
            
            // Cek file lama ada di database
            if($product->foto_produk_path != null) {
                // Hapus file
                Storage::delete($product->foto_produk_path);
            }
            
            $user_id = Auth::user()->id;
            $newFileName = Str::random(50) . '.' . $request->file('foto_produk_path')->getClientOriginalExtension();
            $foto_produk_path = $request->file('foto_produk_path')->storeAs('public/produk_toko/' . $user_id, $newFileName);

            $product->update([
                'foto_produk_path' => $foto_produk_path,
            ]);
        }

        if($request->has('id')) {
            $product->update($request->except('foto_produk_path'));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        
        Storage::delete($product->foto_produk_path);
        $product->delete();

        // Kembali ke halaman sebelumnya
        return redirect()
            ->back()
            ->with([
                'success' => 1,
            ]);
    }
}
