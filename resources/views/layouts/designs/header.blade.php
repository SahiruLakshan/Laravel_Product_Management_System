<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{'/'}}">PMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{'/'}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{'/create'}}">Insert Product</a>
          </li> 
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown ms-auto">
            @if (Route::has('login'))
            @auth
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('profile.edit')}}">{{ __('Profile') }}</a></li>
                  <form method="POST" action="{{ 'logout' }}">
                    @csrf
                    <a class="dropdown-item" href="{{ 'logout' }}" onclick="event.preventDefault(); this.closest('form').submit();">
                      {{ __('Log Out') }}
                  </a>
                  </form>  
                </ul>
          </li>

          @else
                <li class="nav-item">
                  <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                </li>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
            @endauth
                </div>
            @endif
            </li>
        </ul>
        
          
    
      </div>
    </div>
  </nav>