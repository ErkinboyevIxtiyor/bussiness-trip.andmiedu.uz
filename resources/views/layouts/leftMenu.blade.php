<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link bg-info color-palette">
      <div class="">
        @foreach ($system_logo as $item)
          <img src="{{asset('system/system_logo/'.$item->system_logo)}}" alt="" class="w-25">
          <span class="ml-1">ANDMI</span>
      @endforeach
      </div>
      {{-- <div class="d-flex justify-content-center align-items-center">
        <span class="">ANDMI</span>
      </div> --}}
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-building-columns"></i>
              <p>
                OTM strukturasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/structure/faculty" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fakultetlar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/structure/department" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kafedra</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/structure/section" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bo‘lim</p>
                </a>
              </li>
            </ul>
          </li> --}}

          <li class="nav-item">
            <a href="#" class="nav-link rounded-0">
              <i class="fa-solid fa-briefcase"></i>
              <p>
                Xodimlar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/employee/employee" class="nav-link rounded-0">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xodimlar bazasi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link rounded-0">
              <i class="fa-solid fa-list-ul"></i>
              <p>
                Xizmat safari
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/bussiness-trip/date" class="nav-link rounded-0">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xizmat safari bazasi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link rounded-0">
              <i class="fa-solid fa-book"></i>
              <p>
                O‘quv yili
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/curriculum/education-year" class="nav-link rounded-0">
                  <i class="far fa-circle nav-icon"></i>
                  <p>O‘quv yili</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- <li class="nav-item ">
            <a href="#" class="nav-link rounded-0">
              <i class="fa-solid fa-chart-column"></i>
              <p>
                Statistika
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/statistical/statistical" class="nav-link rounded-0">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Statistika</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item">
            <a href="#" class="nav-link rounded-0">
              <i class="fa-solid fa-gear"></i>
              <p>
                Tizim
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/system/admin" class="nav-link rounded-0">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administrator</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/system/configuration" class="nav-link rounded-0">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tizim sozlamalari</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/system/position" class="nav-link rounded-0">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tizim lavozimlari</p>
                </a>
              </li>
            </ul>
          </li>

       






 


           
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>