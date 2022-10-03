<nav class="main-header navbar navbar-expand bg-info color-palette p-0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu btn btn-info rounded-0">
        <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown" aria-expanded="false">
          @if ($LoggedUserInfo['admin_avatar'] == "")
          <img class="user-image img-circle elevation-2 " src="{{asset('admin_avatar/admin_avatar.jpg')}}" alt="{{$LoggedUserInfo['second_name']}} {{$LoggedUserInfo['first_name']}}">
          @else
          <img class="user-image img-circle elevation-2 " src="{{asset('admin_avatar/'.$LoggedUserInfo['admin_avatar'])}}" alt="{{$LoggedUserInfo['second_name']}} {{$LoggedUserInfo['first_name']}}" style="width:35px; height:35px;"> 
          @endif
          <span class=" text-uppercase user-name ">{{$LoggedUserInfo['second_name']}} {{$LoggedUserInfo['first_name']}}</span> 
          {{-- <span class="user-role">Administrator</span> --}}
        </a>
        <ul class="dropdown-menu dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px; width:175px;">
          <li class="dropdown-header">
            <h6 class="mt-1">Administrator</h6>
          </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center text-secondary" href="/profil/profil-edit/{{$LoggedUserInfo['id']}}">
                <i class="bi bi-person"></i>
                <span><i class="fa-solid fa-user mr-1"></i> Profil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center text-secondary" href="/dashboard/logout">
                <i class="fa-solid fa-right-from-bracket mr-1"></i>
                <span>Chiqish</span>
              </a>
            </li>

        
         
          
        </ul>
      </li>
    </ul>
  </nav>