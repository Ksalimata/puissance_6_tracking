<div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">
              <a href="{{Route('dashboard')}}" class="site_title"><i class="fa fa-map-marker"></i> <span>TELCO Tracking</span></a>
            </div>

            <div class="clearfix"></div>

            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('assets/images/TELCO_LOGo.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span><h2>Bienvenue,<br /> {{Auth::user()->username}}</h2></span>
                
              </div>
            </div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">               
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Home</a>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Clients <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('client.index')}}">Liste des clients</a></li>
                      <li><a href="{{route('client.create')}}">Ajouter un client</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Sites <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('site.index')}}">Liste des sites</a></li>
                      <li><a href="{{route('site.create')}}">Ajouter un site</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-group"></i> Employes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('employe.index')}}">Liste des employés</a></li>
                      <li><a href="{{route('employe.create')}}">Ajouter un employé</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-bar-chart-o"></i> Pointages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('pointage.index')}}">Liste des pointages</a></li>
                      <li><a href="{{route('pointage.create')}}">Ajouter un pointages</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('user.index')}}">Liste des utilisateurs</a></li>
                      <li><a href="{{route('user.create')}}">Ajouter un utilisateur</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Rôles <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('role.index')}}">Liste des rôles</a></li>
                      <li><a href="{{route('role.create')}}">Ajouter un rôle</a></li>
                    </ul>
                  </li>
                  <li><a href="{{route('carte')}}"><i class="fa fa-clone"></i>Supervision</a>
                  </li>
                </ul>
              </div>
           </div>
            <!-- /sidebar menu -->
          </div>
</div>