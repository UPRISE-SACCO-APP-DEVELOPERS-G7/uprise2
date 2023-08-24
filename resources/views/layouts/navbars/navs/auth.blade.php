<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> {{ $navName }} </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="nc-icon nc-palette"></i>
                        <span class="d-lg-none">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nc-icon nc-zoom-split"></i>
        
        <form class="form-inline ml-2">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="{{ __('Search') }}">
                <div class="input-group-append">
                    
                </div>
            </div>
        </form>
    </a>
</li>





            </ul>
            <ul class="navbar-nav   d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href=" {{route('profile.edit') }} ">
                        <span class="no-icon">{{ __('Account') }}</span>
                    </a>
                </li>
               
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); "> {{ __('Log out') }} </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    history.pushState(null, null, location.href);
    window.onpopstate = function(){history.go(1);}
</script>
