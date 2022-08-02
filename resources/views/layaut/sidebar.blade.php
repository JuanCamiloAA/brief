<nav class="navbar fondo fixed-top">
  <div class="container-fluid d-flex justify-content-between">
    <div class="btn-group">
        <a href="{{route('brief.index')}}" class=""><img src="../img/Logo.png" alt="Logo" width="100rem" height="50rem"></a>
    </div>
    <div class="btn-group">
      <!-- <form action="{{route('login.store')}}" method="post">
        @csrf
        <button type="submit" class="btn"><h3 class="text-white pt-2"><i class="fas fa-sign-out-alt"></i></h3></button>
      </form> -->
        <a href="{{route('login.index')}}"><h3 class="text-white pt-2"><i class="fas fa-sign-out-alt"></i></h3></a>
    </div>
  </div>
</nav>