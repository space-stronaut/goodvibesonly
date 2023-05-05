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
    <link type="text/css" rel="stylesheet" href="{{asset('css/style_inven.css') }}">
</head>

<body>
    <header>
        <div>
            <button class="back" ><a href="{{route('user.index')}}">Back</a></button>
            {{-- <a href="{{ route('user.create') }}" class="back">Create User</a> --}}
        </div>
      </header>
    <!-- <table>
        <tr>
            <td> -->
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    {{-- <div>
                        <label for="customerCode">Customer Code</label>
                        <input type="text" name="customerCode" id="customerCode">
                    </div><br> --}}
                    <div>
                        <label for="customer">Name</label>
                        <input type="text" name="name" id="customer">
                    </div><br>
                    <div>
                        <label for="telp">No Telp</label>
                        <input type="text" name="no_hp" id="telp">
                    </div><br>
                    <div>
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email">
                    </div><br>
                    <div>
                        <label for="alamatcust">Alamat</label>
                        <input type="text" name="alamat" id="alamatcust">
                    </div>
                    <div>
                        <label for="alamatcust">Password</label>
                        <input type="password" name="password" id="alamatcust">
                    </div>
                    <div>
                        <label for="alamatcust">Role</label>
                        {{-- <input type="text" name="alamat" id="alamatcust"> --}}
                        <select name="role" id="">
                            <option value="">Pilih Role...</option>
                            <option value="customer">Customer</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form_action--button">
                        {{-- <input type="submit" value="Submit"> --}}
                        <button>Submit</button>
                        {{-- <input type="reset" value="Reset"> --}}
                    </div>
                </form>

                <!-- <td> -->
                    {{-- <table class="list" id="storeList">
                        <thead>
                            <tr>
                                {{-- <th>Customer Code</th> --}}
                                
                <!-- </td>
            </td>
        </tr>
    </table> -->
    <script type="text/javascript" src="js_user.js"></script>
</body>
</html>