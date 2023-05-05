<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Vibes Only [Check Out]</title>
    <link rel="stylesheet" href="styles2.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    {{-- <script type="text/javascript" src="jquery.store.js"></script> --}}

</head>
<body>
    <!--NAVIGATION BAR-->
    <nav>

        <input type="checkbox" name="" id="nav-button">
        <label for="nav-button">&#9776</label>

        <div class="navbar">
            <img src="img/logooo.png" alt=""/>
        </div>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('men.index') }}">Man</a></li>
            <li><a href="{{ route('woman.index') }}">Woman</a></li>
            {{-- <li><a href="Account.html">Account</a></li> --}}
            <li><a href="{{ route('cart.index') }}"><img src="{{ asset('img/cart.svg') }}" alt=""/></i></a></li>
            @auth
            <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
              <button>Logout</button>
          </form>
            </li>
            @endauth
            @guest
            <a class="cta" href="{{ route('login') }}"><button>Login</button></a>
            @endguest
        </ul>
    </nav>

    <div id="site">
        <header id="masthead">
            <h1></h1>
        </header>
        <div id="content">
            <h1>Your Shopping Cart</h1>
            <form action="{{ route('cart.create') }}" method="get">
                @csrf
                <table class="shopping-cart">
                  <thead>
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
                    <tr>
                        Tidak Ada Item
                    </tr>
                @endforelse
                <button class="btn btn-primary">Checkout</button>
                </form>
                  </tbody>
                  <button class="btn btn-danger ms-2" onclick="hapus()">Hapus <span id="jum"></span></button>
                </table>
                {{-- <p id="sub-total">
                    <strong>Sub Total</strong>: <span id="stotal"></span>
                </p>
                <ul id="shopping-cart-actions">
                    <li>
                        <input type="submit" name="update" id="update-cart" class="btn" value="Update Cart" />
                    </li>
                    <li>
                        <input type="submit" name="delete" id="empty-cart" class="btn" value="Empty Cart" />
                    </li>
                    <li>
                        <a href="Home.html" class="btn">Continue Shopping</a>
                    </li>
                    <li>
                        <a href="CheckOut.html" class="btn">Go To Checkout</a>
                    </li>
                </ul> --}}
            </form>
        </div>
        
        
    
    </div>
    
    <footer id="site-info">
            Copyright &copy; 
        </footer>
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
</body>
</html>