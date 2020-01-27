<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<!-- Grey with black text -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/')}}/registration">Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/')}}/logIn">Log In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/')}}/logOut">Log Out</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/')}}/addproduct">Add Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/')}}/showproduct">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/')}}/editProfile">Edit Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/')}}/card">Card</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/')}}/wish">Wish List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/')}}/myProducts">My Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/')}}/myOrders">My Orders</a>
      </li>
      <li>
          <div class="input-group">
              <input type="text" class="form-control" id="searchProduct" style = "width:150" name="q"
                  placeholder="Search product"> 
                  <div >
                     <input type="range" name="min" value="0" min="0" max="100000" step="10" class="form-control mr-3 ml-3" id="min" style = "width:100; height:20"  onchange="updateMinInput(this.value);">
                     <input type="text" placeholder="Min price" style = "width:80; height:20; margin:0 30px;" value="" id="minrange">
                    
                  </div>
                  <div >
                     <input type="range" name="max" value="100000" min="0" max="100000" step="10" class="form-control mr-3 ml-3" id="max" style = "width:100; height:20"  onchange="updateMaxInput(this.value);">
                     <input type="text" placeholder="Max price" style = "width:80; height:20; margin:0 30px;" value="" id="maxrange">
                    
                  </div>
                  <span class="input-group-btn">
                  <button type="submit" class="btn btn-info" id="search">
                      Search
                  </button>
              </span>
          </div>
      </li>
    </ul>
  </div>
</nav>
<input type="hidden" id="token" value="{{csrf_token()}}">
<div class="container">
	@yield('content')

</div>

<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
