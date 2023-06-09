
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="text/css" href="{{ asset('icon/logo-kelinik-bersama.jpg')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <title>@yield('title', 'Klinik Bersama')</title>
  </head>

<style type="text/css">
    ::-webkit-scrollbar {
        width:5px;
        background:#fff;
        -webkit-border-radius:0px;
        border-radius:10px;
        overflow-x:hidden; 
    }

    ::-webkit-scrollbar-thumb {
        background:#1E90FF;
        -webkit-border-radius:0px;
        border-radius:10px;
    }


    ::placeholder {
        color: #000;
        opacity: 1; /* Firefox */
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: #000;
    }

    ::-ms-input-placeholder { /* Microsoft Edge */
        color: #000;
    }
</style>


  <body class="bg-success" style="--bs-bg-opacity: .25;">

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container-fluid">
        <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand text-warning" href="#">
            @guest 
            @endguest 
            @auth Akun {{auth()->user()->status_akses }} @endauth
          </a>
            
            @guest

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-white" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-white" href="{{ url('/login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-white" href="{{ url('/sop') }}">SOP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-white" href="{{ url('/profil') }}">Profil</a>
            </li>                   
          </ul>

            @endguest

            @auth

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <div class="dropdown">
              <a class="nav-link active text-white" class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" href="#">Welcome {{ auth()->user()->name}}</a>
          
              <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1">
                  <li class="nav-item">
                    <a class="nav-link active text-white" href="{{ url('/dashboard') }}">Dashboard</a>
                  </li>

                  <hr class="dropdown-divider text-white">
                  
                  <li class="nav-item">
                    <a class="nav-link active text-white" href="{{ url('/upass') }}">Ubah Password</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link active text-white" href="{{ url('/akun/biodata') }}">Biodata</a>
                  </li>
              </ul>
            </div>  
          </ul>

            <ul class="navbar-nav mb-2" style="float:right;">
              <li class="nav-item">
                <form method="POST" action="{{ url('/logout') }}">
                  @csrf
                  <button type="submit" class="nav-link active btn text-white" data-bs-toggle="modal" onclick="return confirm('Are you sure..??');" style="border:none; padding-left:10px; padding-top:10px;">Logout</button>
                </form>
              </li> 
            </ul>

            @endauth

        </div>
      </div>
    </nav>

    <div class="isi p-2">
      @yield('container')  
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

  </body>
</html>






