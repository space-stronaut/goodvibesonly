<!DOCTYPE html>
<head>
    <title>Inventory</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style_inven.css') }}">
</head>

<body>
    <header>
        <div><button class="back" ><a href="{{route('product.index')}}">Back</a></button></div>
      </header>
    <table>
        <tr>
            <td>
                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- <div>
                        <label for="productCode">Product Code</label>
                        <input type="text" name="productCode" id="productCode">
                    </div> --}}
                    <div>
                        <label for="product">Product Name</label>
                        {{-- <input type="text" name="product" id="product"> --}}
                        <input type="text" name="nama_produk" placeholder="Nama Produk" class="form-control">
                        
                    </div>
                    <div>
                        <label for="qty">Harga</label>
                        <input type="number" name="harga" placeholder="Harga" class="form-control">
                    </div>
                    <div>
                        <label for="">Deskripsi</label>
                        {{-- <div class="form-group"> --}}
                            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
                        {{-- </div> --}}
                    </div>
                    <div>
                        <label for="perPrice">Foto</label>
                        {{-- <input type="number" name="perPrice" id="perPrice"> --}}
                        <input type="file" name="foto" placeholder="Foto" class="form-control">
                    </div>
                    <div>
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="">Pilih Kategori...</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form_action--button">
                        {{-- <input type="submit" value="Submit"> --}}
                        <button>Submit</button>
                        {{-- <input type="reset" value="Reset"> --}}
                    </div>
                </form>

                
            </td>
        </tr>
    </table>
    <script type="text/javascript" src="{{ asset('js.js') }}"></script>
</body>
</html>