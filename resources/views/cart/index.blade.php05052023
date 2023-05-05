@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                My Cart
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Produk</th>
                            <th>QTY</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                        @endif
                        @if ($message = Session::get('gagal'))
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @endif
                        <form action="{{ route('cart.create') }}" method="get">
                            @csrf
                        @forelse ($carts as $item)
                            <tr>
                                <th>
                                    <input type="checkbox" class="check" name="id[]" value="{{ $item->id }}" id="">
                                </th>
                                <td>
                                    {{$item->product->nama_produk}}
                                </td>
                                <td>
                                    {{$item->qty}}
                                </td>
                                <td>
                                    Rp. {{ format_uang($item->total_semua) }}
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                        <button class="btn btn-primary">Checkout</button>
                        </form>
                    </tbody>
                    <button class="btn btn-danger ms-2" onclick="hapus()">Hapus <span id="jum"></span></button>
                </table>
            </div>
        </div>
    </div>

    <script>
        let check = document.querySelectorAll('.check')
        let arr = []
        document.getElementById('jum').textContent = arr.length

            check.forEach(e => {
                e.addEventListener('change', function(i) {
                    if (i.target.checked == true) {
                        arr.push(i.target.value)
                        document.getElementById('jum').textContent = arr.length
                    }else{
                        let index = arr.indexOf(i.target.value)
                        arr.splice(index, 1)
                        document.getElementById('jum').textContent = arr.length
                    }
                    console.log(arr)
                })
            });

            async function hapus(){
                try {
                    let response = await fetch('api/cart/delete/api', {
                        headers : {
                            'Accept' : 'application/json',
                            'Content-Type' : 'application/json'
                        },
                        method : 'POST',
                        body : JSON.stringify({
                            id : arr
                        })
                    })

                    location.reload()
                } catch (error) {
                    console.log(error)
                }
            }
    </script>
@endsection
