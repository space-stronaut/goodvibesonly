<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();

        return view('transaction.index', compact('transactions'));
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
            $total = 0;

            foreach ($request->id as $i) {
                $total += Cart::find($i)->total_semua;
            }
            $transaction = Transaction::create([
                'user_id' => Auth::user()->id,
                'total' => $total,
                'payment' => $request->payment,
                'no_credit' => $request->no_credit,
                'tipe_pemesanan' => $request->tipe_pemesanan,
                'alamat_tujuan' => $request->alamat_tujuan,
                'status' => $request->status
            ]);

            foreach ($request->id as $id) {
                Cart::find($id)->update([
                    'status' => 'terkonfirmasi'
                ]);
            }

            $transaction->carts()->attach($request->id);

            return redirect()->route('transaction.index')->with('success', 'Transaksi Berhasil');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);

        return view('transaction.show', compact('transaction'));
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
        //
    }
}
