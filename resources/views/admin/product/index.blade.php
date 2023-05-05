<!DOCTYPE html>
<head>
    <title>Inventory</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style_inven.css') }}">
</head>

<body>
    <header>
        <div><button class="back" ><a href="/home">Back</a></button>
            <a href="{{route('product.create')}}" class="back">Create Product</a>
        </div>
      </header>
    <table>
        <tr>
            

                <td>
                    <table class="list" id="storeList">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Harga</th>
                                <th>Action</th>
                                {{-- <th>Kategori</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $item->nama_produk }}</th>
                                    <th>{{ $item->harga }}</th>
                                    <th>
                                        <a href="{{route('product.edit', $item->id)}}">Edit</a>
                                        <form action="{{ route('product.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger ms-2">Hapus</button>
                                        </form>
    
                                    </th>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </td>
            {{-- </td> --}}
        </tr>
    </table>
    <script type="text/javascript" src="{{ asset('js.js') }}"></script>
</body>
</html>