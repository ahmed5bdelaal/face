
   @extends('layouts/lay')
    <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v4.1.1">
        <title>مدونتي</title>
    
        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">
    
        <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{ asset('layouts/lay.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
        <!-- Favicons -->
    
        <script>
          function openForm() {
      document.getElementById("myForm").style.display = "block";
    }
    
    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
    </script>
        
        <!-- Custom styles for this template -->
        <link href="album.css" rel="stylesheet">
      </head>
      <body>
        <header>
      
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
        <a href="{{url('/')}}" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
            <strong>مدونتي</strong>
          </a>
          @guest

           @else 
           <a href="{{url('/show/'.Auth::user()->id)}}" class="navbar-brand d-flex align-items-center">الصفحة الشخصية
        </a>
        <a href="{{url('/about')}}" class="navbar-brand d-flex align-items-center">من نحن
        </a>
        
          @endguest
          
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
            <div class="dropdown">
                  <div class="chip">
                    <img src="{{url('uploads/avatar-5.png')}}" alt="Person" width="96" height="96">
                    <a href="{{url('/show/'.Auth::user()->id)}}">
                    {{Auth::user()->name}}
                    </a>
                  </div>
                    <div class="dropdown-content">
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                    </div>
                  </div>
                    
                
            @endguest
        </ul>
        </div>
      </div>
    </header>

        <main class="py-4" role="main" >
            @yield('content')
        </main>
    
    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">الرجوع الي الاعلي</a>
        </p>
        <p> &copy;ahmed abdelaal,datac</p>
        
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
          <script>window.jQuery || document.write('<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js "><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script></body>
          <script src="sweetalert2.all.min.js"></script>
          <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
          <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    </html>
    
