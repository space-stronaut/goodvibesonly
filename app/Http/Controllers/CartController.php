<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->where('status', 'ditambahkan')->get();

        return view('cart.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (isset($request->id)) {
            $id = $request->id;

            return view('cart.checkout', compact('id'));
        }else{
            return redirect()->back()->with('gagal', 'Harap Pilih Minimal 1 Barang');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'qty' => ['required']
        ]);
        $product = Product::find($request->product_id);
        if (Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->where('status', 'ditambahkan')->first() != NULL) {
            $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->where('status', 'ditambahkan')->first();
            Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->where('status', 'ditambahkan')->first()->update([
                'qty' => $cart->qty + $request->qty,
                'total_semua' => $product->harga * ($cart->qty + $request->qty)
            ]);
        }else{
            Cart::create([
                'product_id' => $request->product_id,
                'user_id' => $request->user_id,
                'qty' => $request->qty,
                'total_semua' => $product->harga * $request->qty,
                'status' => 'ditambahkan'
            ]);
        }

        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::find($id)->update([
            'status' => 'dihapus'
        ]);;

        return redirect()->back();
    }

    public function deleteApi(Request $request)
    {
        foreach ($request->id as $key) {
            Cart::find($key)->update([
                'status' => 'dihapus'
            ]);
        }
        return response()->json([
            'status' => true
        ], 200);
    }
}
