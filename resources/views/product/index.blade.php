<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Vibes Only [Man]</title>
    <link rel="stylesheet" href="styles2.css" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.store.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <!--NAVIGATION BAR-->
<section id="nav-bar">
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

    <section class="new-arrivals">
        <div id="site">
            <div class="site-grid">
                @forelse ($products as $item)
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                        <div class="product-top">
                            <img src="data:image/png;base64,{{ $item->foto }}">
                        </div>
                        
                        
                        <div class="product-bottom text-center">
                        <h3>{{ $item->nama_produk }}</h3>
                        <div class="product-description" data-name="TM001" data-price="20">
                            
                            <p class="product-price">Rp. {{ format_uang($item->harga) }}</p>
                            <form action="{{ route('cart.store') }}" class="form-inline" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div>
                                    <input type="number" name="qty" placeholder="Quantity" id="" value="1" min="1" required name="qty-2" id="qty-2" class="qty">

                                  </div>
                                  <p><input type="submit" value="Add to cart" class="btn" /></p>
                            </form>
                                    
                        </div>
                        </div>
                        </div>
                </div>
                @empty
                    
                @endforelse
                </div>
            </div>

            </div>
        </div>
        </section>
</section>

</body>
</html>