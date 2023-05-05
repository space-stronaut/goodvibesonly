<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Vibes Only</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}" />
    
</head>
<body>
    <!--NAVIGATION BAR-->
    <nav>

        <input type="checkbox" name="" id="nav-button">
        <label for="nav-button">&#9776</label>

        <div class="navbar">
            <img src="{{ asset('img/logooo.png') }}" alt=""/>
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

    <!-- Image Slider -->
        <div id="slider">
            <figure>
                <img src="{{ asset('img/header1.png') }}">
                <img src="{{ asset('img/header2.png') }}">
                <img src="{{ asset('img/header3.png') }}">
                <img src="{{ asset('img/header4.png') }}">
                <img src="{{ asset('img/header1.png') }}">
            </figure>
        </div>

    <!-- COMPANY PROFILE -->
    <div class="intro">
        <h1>
            <p1>
                Unleash Your Good Vibes!
            </p1>
        </h1>
        <br>
        <p2>
            At Good Vibes Only, we believe that fashion should be fun, exciting, and full of personality.
            <br> 
            Our brand is all about embracing your unique style and expressing yourself through your wardrobe. 
            <br>
            We offer a wide range of colorful and eclectic clothing, whether you're looking for a bold pattern or a quirky graphic tee, we've got you covered.
            <br>
        </p2>
    </div>

    <!-- Sekilas Produk -->
    <main>
		<section>
			<h2>Produk Terbaru</h2>
            <br>
            @forelse ($products as $item)
            <div class="produk">
              <img src="data:image/png;base64,{{ $item->foto }}">
              <h3>{{ $item->nama_produk }}</h3>
              <p>Price: {{ $item->harga }}</p>
              <button class="butt"><a href="{{ $item->category_id == 1 ? route('men.index') : route('woman.index')}}">Buy Now</a></button>
            </div>
            @empty
                
            @endforelse
		</section>
	</main>

    <!-- FOOTER -->
    <footer> 
        <div class="footer-container">
            <div class="footer-info">
                <a href="#" class="footer-title"><img src="{{ asset('img/logooo.png') }}">
                </a>
                <p class="footer-tagline">Unleash Your Good Vibes</p>
            </div>
            <div class="footer-section-wrapper">
                <div class="footer-section">
                    <h2 class="footer-category">Our Company</h2>
        <div class="footer-list">
          <li>
            <p>Legal Notice</p>
          </li>
          <li>
            <p>FAQs</p>
          </li>
          <li>
            <p>About Us</p>
          </li>
          <li>
            <p>Secure Payment</p>
          </li>
        </div>
      </div>
      <div class="footer-section">
        <h2 class="footer-category">Services</h2>
        <div class="footer-list">
          <li>
            <p>Self Pick-Up</p>
          </li>
          <li>
            <p>Delivery</p>
          </li>
          <li>
            <p>Contact Us</p>
          </li>
        </div>
      </div>
      <div class="footer-section">
        <h2 class="footer-category">Contact</h2>
        <div class="footer-list">
          <li>
            <p>Jl. Kenangan Web No. 148, Surabaya, jawa timur, Indonesia</p>
          </li>
          <li>
            <p>(+62) 821 1163 330</p>
          </li>
          <li>
            <p>GVO@gmail.com</p>
          </li>
          <li>
            <p>@GoodVibes</p>
          </li>
        </div>
      </div>
    </div>
  </div>
        <div class="footer-bottom">
            <div class="footer-bottom-container">
                <p class="footer-copyright">&copy; 2023 Good Vibes Only. All rights reserved.</p>
                <div class="footer-social">
                    <li><a href="#"><img src="{{ asset('img/ig.svg') }}" alt=""/></i></a></li>
                    <li><a href="#"><img src="{{ asset('img/twt.svg') }}" alt=""/></i></a></li>
                    <li><a href="#"><img src="{{ asset('img/gmail.svg') }}" alt=""/></i></a></li>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>