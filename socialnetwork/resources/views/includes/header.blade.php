<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href=".//dashboard">Social Networq</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href=".//dashboard">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <div class="input-group">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="searchUser">
        <button class="btn btn-outline-success my-2 my-sm-0 search" type="submit" id="search">Search</button>
      </div>
       
      @if(session()->has('user'))
      <li class="nav-item-right">
        <a class="nav-link" href="./account">Account</a> 
      </li>
      <li class="nav-item">
        <img src="Images/friends.png" class="icon">
      </li> 
      <li class="nav-item">
        <img src="Images/notification.png" class="icon" id="notification">
      </li>
      <li class="nav-item" >
        <a class="nav-link" style="width: 100px;" href="./logout">Log Out</a> 
      </li>
      @endif
      
       

    

    
    </ul>
  </div>
</nav>
<input type="hidden" id="token" value="{{csrf_token()}}">

</header>