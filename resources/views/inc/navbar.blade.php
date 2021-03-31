<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">{{config('app.name', 'ChatApp')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

    @if(!Auth::guest())

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/find_users">Find users</a>
            </li>

            <li class="nav-item">
                
                    <a class="nav-link" href="/inbox">{{$number_of_messages == 0 ? 'Inbox' : "Inbox($number_of_messages)"}}</a>
                
            </li>

            <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->username }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">

                        <li> <a class="nav-link" href="/profile/{{Auth::user()->id}}"> Profile </a> </li>

                        <li>
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
            </li>

        <form class="user" method="POST" action="/search_result" ass="form-inline my-2 my-lg-0">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input class="form-control mr-sm-2" type="search" name="search_user" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>

    </div>
    
    @endif
    </nav>