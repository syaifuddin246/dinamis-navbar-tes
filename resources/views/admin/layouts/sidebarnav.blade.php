 <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header @yield('dashboard-active')">Main Menu</li>
          <li class="nav-item @yield('dashboard-home')">
            <a href="{{url('/home')}}" class="nav-link @yield('post_dashboard')">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-header">Menu</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Menu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/menuitem')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Menu</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Post Sub Menu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/submenuitem')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Post Sub Menu1</p>
                </a>
                <a href="{{url('admin/submenuitem1')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Post Sub Menu2</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-header @yield('user-active')">List User</li>
          <li class="nav-item @yield('user')">
          <a href="{{url('/user')}}" class="nav-link @yield('post_user')">
              <i class="nav-icon fas fa-users"></i>
              <p>Management User</p>
            </a>
          </li> --}}
          <li class="nav-header">Logout System</li>
          <li class="nav-item">
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i>
                     </i>
                     {{ __('Logout Account') }} 
                   </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf                                    
                  </form>
          </li>
         
        </ul>
      </nav>