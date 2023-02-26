<div>
    <nav class="navbar navbar-expand-md navbar-light bg-white ">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
            Deny <strong style="color: gray;">Aluminium</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @if (Auth()->user())
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('history') }}">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="https://wa.me/6285850757026">Hubungi Kami</a>
                    </li>
                  
                </ul>
                @else
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link"href="https://wa.me/6285850757026">Hubungi Kami</a>
                    </li>
                </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @if (Auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('keranjang')}}">
                        <i class="fas fa-shopping-bag"></i> Keranjang
                         @if($jumlah_pesanan!==0)
                         <span class="badge badge-danger">{{$jumlah_pesanan}}</span>
                         @endif
                         </a>
                    </li>
                    @else
                    @endif
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
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>