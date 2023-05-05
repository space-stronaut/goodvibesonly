<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="./css/style_inven.css">
    <title>User Control - Admin</title>
</head>
<body>
    <!DOCTYPE html>
<head>
    <title>Inventory</title>
    <link type="text/css" rel="stylesheet" href="../dashboard/css/style_inven.css">
</head>

<body>
    <header>
        <div>
            <button class="back" ><a href="/home">Back</a></button>
            <a href="{{ route('user.create') }}" class="back">Create User</a>
        </div>
      </header>
    <!-- <table>
        <tr>
            <td> -->
                {{-- <form>
                    <div>
                        <label for="customerCode">Customer Code</label>
                        <input type="text" name="customerCode" id="customerCode">
                    </div><br>
                    <div>
                        <label for="customer">Customer Name</label>
                        <input type="text" name="customer" id="customer">
                    </div><br>
                    <div>
                        <label for="telp">No Telp</label>
                        <input type="text" name="telp" id="telp">
                    </div><br>
                    <div>
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email">
                    </div><br>
                    <div>
                        <label for="alamatcust">Alamat Customer</label>
                        <input type="text" name="alamatcust" id="alamatcust">
                    </div>
                    <div class="form_action--button">
                        <input type="submit" value="Submit">
                        <input type="reset" value="Reset">
                    </div>
                </form> --}}

                <!-- <td> -->
                    <table class="list" id="storeList">
                        <thead>
                            <tr>
                                {{-- <th>Customer Code</th> --}}
                                <th>User</th>
                                <th>No Telp</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $item)
                                <tr>
                                    <th>
                                        {{$item->name}}
                                    </th>
                                    <td>
                                        {{$item->no_hp}}
                                    </td>
                                    <td>
                                        {{$item->email}}
                                    </td>
                                    <td>
                                        {{$item->alamat}}
                                    </td>
                                    <td>
                                        <a href="{{route('user.edit', $item->id)}}" class="back">Edit</a>
                                        <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger ms-2">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                <!-- </td>
            </td>
        </tr>
    </table> -->
    <script type="text/javascript" src="js_user.js"></script>
</body>
</html>