<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/home">CD Test App</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li id='dashboard'><a href="/dashboard">Dashboard<span class="sr-only">(current)</span></a></li>
        <li id='profile'><a href="/users/show">Profile</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right nav-bar-right-offset-2">
        <li><a href="/users/signout">Not<?=" " . $this->session->userdata('first_name') . "? ";?>Sign Out</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>