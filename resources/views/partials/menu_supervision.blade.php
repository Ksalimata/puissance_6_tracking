<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <a class="navbar-brand" href="{{Route('carte')}}">Carte</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li title="Liste des abscents"><a href="{{Route('afficherTableauListeEmployeNonPointe')}}"><i class="fa fa-warning"></i>
                @if($nbre_abscents>0)
                <span style="padding: 2px 6px;position: absolute;right: 2px;top: 8px; " class="badge bg-green">
                    {{$nbre_abscents}}
                </span>
                @endif
                </a></li>
                <li title="Message d'alerte des vigiles"><a href="{{Route('afficherTableauMessages')}}"><i class="fa fa-envelope-o" style="color: red;"></i>
                @if($nbre_messages>0)
                <span style="padding: 2px 6px;position: absolute;right: 2px;top: 8px;" class="badge bg-green">
                    {{$nbre_messages}}
                </span>
                @endif
                </a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                          <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out pull-right"></i> Log Out
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method  ="POST" style="display: none;">
                            {{ csrf_field() }}
                          </form>
                        </li> 
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
</nav>