<!Doctype HTML>
<html>
<head>
	<title>GVO-Admin</title>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
	
	<div id="mySidenav" class="sidenav">
	<p class="logo"><img src="images/logooo.png"></p>
  <a href="/home" class="icon-a"><i class="fa fa-home icons"></i> &nbsp;&nbsp;Home</a>
  <a href="{{ route('user.index') }}"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;User Controls</a>
  <a href="{{ route('pemesanan.index') }}"class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Orders</a>
  <a href="{{ route('product.index') }}"class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;Inventory</a>
  {{-- <a href="account_admin.html"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Accounts</a> --}}

</div>
<div id="main">

	<div class="head">
		<div class="col-div-6">
<span style="font-size:30px;cursor:pointer; color: rgb(0, 0, 0);" class="nav"  >&#9776; Dashboard</span>
<span style="font-size:30px;cursor:pointer; color: rgb(0, 0, 0);" class="nav2"  >&#9776; Dashboard</span>
</div>
	
	<div class="col-div-6">
	<div class="profile">

		<img src="{{ asset('images/user.png') }}" class="pro-img" />
		<p>{{ Auth::user()->name }}<span>Admin</span></p>
	</div>
</div>
	<div class="clearfix"></div>
</div>

	<div class="clearfix"></div>
	<br/>
	
	<div class="col-div-3">
		<div class="box">
			<p>{{$user }}<br/><span>Customers</span></p>
			<i class="fa fa-users box-icon"></i>
		</div>
	</div>
	{{-- <div class="col-div-3">
		<div class="box">
			<p>37<br/><span>Today Web Visit</span></p>
			<i class="fa fa-eye box-icon"></i>
		</div>
	</div> --}}
	<div class="col-div-3">
		<div class="box">
			<p>{{$transaction}}<br/><span>Orders</span></p>
			<i class="fa fa-shopping-bag box-icon"></i>
		</div>
	</div>
	<!-- <div class="col-div-3">
		<div class="box">
			<p>5<br/><span>-</span></p>
			<i class="fa fa-tasks box-icon"></i>
		</div>
	</div> -->
	<div class="clearfix"></div>
	<br/><br/>
	<div class="col-div-8">
		<div class="box-8">
		<div class="content-box">
			<p>ORDER<button class="butt"><a href="{{ route('pemesanan.index') }}">See All</a></button></p>
			<br/>
			<table>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Tanggal Pembelanjaan</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>#</th>
                </tr>
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
</table>
		</div>
	</div>
	</div>

	<!-- <div class="col-div-4">
		<div class="box-4">
		<div class="content-box">
			<p>Target Sale<span>See All</span></p>
      <p>(Annual)</p>

			<div class="circle-wrap">
    <div class="circle">
      <div class="mask full">
        <div class="fill"></div>
      </div>
      <div class="mask half">
        <div class="fill"></div>
      </div>
      <div class="inside-circle"> 70% </div>
    </div>
  </div>
		</div>
	</div>
	</div> -->
		
	<div class="clearfix"></div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  $(".nav").click(function(){
    $("#mySidenav").css('width','70px');
    $("#main").css('margin-left','70px');
    $(".logo").css('visibility', 'hidden');
    $(".logo span").css('visibility', 'visible');
     $(".logo span").css('margin-left', '-10px');
     $(".icon-a").css('visibility', 'hidden');
     $(".icons").css('visibility', 'visible');
     $(".icons").css('margin-left', '-8px');
      $(".nav").css('display','none');
      $(".nav2").css('display','block');
  });

$(".nav2").click(function(){
    $("#mySidenav").css('width','300px');
    $("#main").css('margin-left','300px');
    $(".logo").css('visibility', 'visible');
     $(".icon-a").css('visibility', 'visible');
     $(".icons").css('visibility', 'visible');
     $(".nav").css('display','block');
      $(".nav2").css('display','none');
 });

</script>

</body>


</html>
