@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Detail Pembelanjaan
            </div>
            <div class="card-body">
                <table style="width: 100%">
                    <tr>
                        <th>Tanggal Pembelanjaan</th>
                        <td>
                            :
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th>Payment</th>
                        <td>
                            :
                        </td>
                        <td class="text-uppercase">
                            {{ $transaction->payment }}
                        </td>
                    </tr>
                    <tr>
                        <th>No Rek</th>
                        <td>
                            :
                        </td>
                        <td>
                            {{ \Illuminate\Support\Str::limit($transaction->no_credit, 3, $end='XXXX') }}
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Pembeli</th>
                        <td>
                            :
                        </td>
                        <td>
                            {{ $transaction->user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>Produk</th>
                        <td>
                            :
                        </td>
                        <td>
                            <ul>
                                @foreach ($transaction->carts as $item)
                                    <li>{{ $item->product->nama_produk }} - {{ $item->qty }}x</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>:</td>
                        <td>
                            Rp.{{ format_uang($transaction->total) }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection