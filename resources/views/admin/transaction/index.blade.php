<!DOCTYPE html>
<head>
    <title>Order-Admin</title>
    <link type="text/css" rel="stylesheet" href="css/style_order.css">
</head>

<body>
    <header>
        <div><button class="back" ><a href="/home">Back</a></button></div>
      </header>
      <!-- <table>
        <tr>
            <td> -->
                
            <!-- </td>
            <td> -->
                <table class="list" id="employeeList">
                    <thead>
                        <tr>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Tanggal Pembelanjaan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $item)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>
                                {{ $item->user->name }}
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td>
                                Rp. {{format_uang($item->total)}}
                            </td>
                            <td class="text-uppercase">
                                {{$item->status}}
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-outline-success me-2">Detail</a>
                                @if ($item->status == "menunggu konfirmasi")
                                <form action="{{ route('pemesanan.update', $item->id) }}" method="post">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="status" value="dikemas">
                                    <button class="btn btn-success">Kemas</button>
                                </form>
                                @endif

                                @if ($item->status == "dikemas" && $item->payment == "cod")
                                <form action="{{ route('pemesanan.update', $item->id) }}" method="post">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="status" value="menunggu paket diambil">
                                    <button class="btn btn-success">Selesai Kemas</button>
                                </form>
                                @endif

                                @if ($item->status == "dikemas" && $item->payment != "cod")
                                <form action="{{ route('pemesanan.update', $item->id) }}" method="post">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="status" value="paket sedang diantar ke alamat tujuan">
                                    <button class="btn btn-success">Selesai Kemas</button>
                                </form>
                                @endif
                                
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                    </tbody>
                </table>
            <!-- </td>
        </tr>
    </table> -->
    <script type="text/javascript" src="js_ordernew.js"></script>
</body>
</html>