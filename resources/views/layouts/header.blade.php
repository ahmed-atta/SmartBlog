<header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
             <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Blog') }}
                </a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            
           
            @if(Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/posts') }}">{{ Auth::user()->name }}</a> 
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();"> 
                        Logout </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    @else
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">Register</a>
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Login</a>
                       
                    @endauth
                </div>
            @endif
          </div>
        </div>
      </header>
