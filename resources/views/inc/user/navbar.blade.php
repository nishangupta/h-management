<nav class="main-header navbar navbar-expand navbar-navy navbar-dark">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('home.index')}}" class="nav-link">Home</a>
    </li>
    @role('admin')
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('account.index')}}" class="nav-link">Logged in as {{auth()->user()->name}}</a>
    </li>
    @endrole
  </ul>
  
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a href="{{route('account.logout')}}" title="Logout" class="nav-link"><i class="fas fa-power-off"></i></a>
    </li>
  </ul>
</nav>