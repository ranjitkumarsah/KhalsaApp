<script>
    jQuery(document).ready(function($){
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    })
</script>
   

<div class="d-flex" id="wrapper">
    <div class=" border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-center"><b>Merge Field</b></div>
            <div class="list-group list-group-flush">
                @if(Auth::user()->role=='Admin')
                    <a href="{{route('Admin/dashboard')}}" class="list-group-item list-group-item-action {{ Request::is('Admin/dashboard*') ? 'active' : '' }}">Dashboard</a>
                @else
                    <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action {{ Request::is('dashboard*') ? 'active' : '' }}">Dashboard</a>
                @endif    
                <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action {{ Request::is('dashboard*') ? 'active' : '' }}">Data Sources</a>
                <form method="POST"  action="{{ route('logout') }}">
                <a href="#" class="list-group-item list-group-item-action ">Profile</a>
                <form method="POST"  action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" class="list-group-item list-group-item-action "
                        onclick="event.preventDefault();
                        this.closest('form').submit();"><i class="fa fa-sign-out fa-rotate-180"></i>&nbsp; {{ __('Log Out') }}
                    </a>
                   
                </form>
            </div>
        </div>
        <div id="page-content-wrapper">

            <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav> -->
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                    {{ $header }}
                    <form method="POST"  action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" class="sm-logout-text"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">{{ __('Log Out') }}
                        </a>
                   
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</div>




 