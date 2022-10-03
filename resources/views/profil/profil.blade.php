@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active text-uppercase">{{$LoggedUserInfo['second_name']}} {{$LoggedUserInfo['first_name']}} {{$LoggedUserInfo['third_name']}} ({{$LoggedUserInfo->admin_id}})</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-6">
                <div class="card card-widget widget-user shadow w-100 rounded-0">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info rounded-0">
                      <h3 class="widget-user-username text-uppercase fs-6">{{$LoggedUserInfo['second_name']}} {{$LoggedUserInfo['first_name']}} {{$LoggedUserInfo['third_name']}}</h3>
                      <h5 class="widget-user-desc ">{{$LoggedUserInfo['admin_id']}}</h5>
                    </div>
                    <div class="widget-user-image">
                     
                      <img class="img-circle elevation-2" src="{{asset('admin_avatar/'.$LoggedUserInfo['admin_avatar'])}}" alt="{{$LoggedUserInfo['second_name']}} {{$LoggedUserInfo['first_name']}}" >
                     
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">Email</h5>
                            <span class="description-text">{{$LoggedUserInfo['email']}}</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                              <h5 class="description-header">Yartilgan</h5>
                              <span class="description-text">{{ date('d-m-Y H:i:s', strtotime($LoggedUserInfo['created_at']))}} </span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                          <div class="col-sm-4 border-right">
                            <div class="description-block">
                              <h5 class="description-header">O‘zgartirilgan</h5>
                              <span class="description-text">{{ date('d-m-Y H:i:s', strtotime($LoggedUserInfo['updated_at']))}}</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                      </div>
                      <!-- /.row -->
                    </div>
                  </div>
            </div>

            <div class="col-md-6">
                  <div class="card card-primary card-outline card-tabs rounded-0">
                    
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Shaxsiy maʼlumot</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="true">So‘zlamalar</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Profil surati</a>
                        </li>
                      </ul>
                     
                    </div>
                    
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                            <form action="/profil-update/{{$LoggedUserInfo['id']}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="second_name">Familiyasi</label>
                                    <input type="text" class="form-control" id="second_name" placeholder="" name="second_name" value="{{$LoggedUserInfo['second_name']}}">
                                </div>
                                <div class="form-group">
                                    <label for="first_name">Ismi</label>
                                    <input type="text" class="form-control" id="first_name" placeholder="" name="first_name" value="{{$LoggedUserInfo['first_name']}}">
                                </div>
                                <div class="form-group">
                                    <label for="third_name">Otasining ismi</label>
                                    <input type="text" class="form-control" id="third_name" placeholder="" name="third_name" value="{{$LoggedUserInfo['third_name']}}">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="d-flex">
                                        <div class="mr-1"><a href="" class="btn btn-block btn-light border border-1 btn-flat" role="button">Bekor</a></div>
                                        <button class="btn btn-flat btn-success" type="submit">O‘zgartirish</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                            <form action="/profil-email-update/{{$LoggedUserInfo['id']}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') border-danger @enderror" id="email" placeholder="" name="email" value="{{$LoggedUserInfo['email']}}">
                                    <span class="text-danger .span-uppercase">@error('email')
                                        {{$message}}
                                    @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Parolni o‘zgartirish </label>
                                    <input type="password" class="form-control @error('parol') border-danger @enderror" id="password" placeholder="Yangi parol" name="parol" >
                                    <span class="text-danger .span-uppercase">@error('parol')
                                        {{$message}}
                                    @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="repassword">Parol tasdig‘i</label>
                                    <input type="password" class="form-control @error('parol_tastig‘i') border-danger @enderror" id="repassword" placeholder="Parol tasdig‘i" name="parol_tastig‘i">
                                    <span class="text-danger span-uppercase">
                                        @error('parol_tastig‘i')
                                        {{$message}}
                                    @enderror
                                </span>
                                </div>
                                <div class="d-flex justify-content-end">
                                  <div class="d-flex">
                                      <div class="mr-1"><a href="" class="btn btn-block btn-light border border-1 btn-flat" role="button">Bekor</a></div>
                                      <button class="btn btn-flat btn-success" type="submit">O‘zgartirish</button>
                                  </div>
                              </div>
                            </form>
                        </div>
                        <div class="tab-pane fade " id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                           <form action="/profil-avatar-update/{{$LoggedUserInfo['id']}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" id="full_name" placeholder="" name="full_name" value="{{$LoggedUserInfo['second_name']}}_{{$LoggedUserInfo['first_name']}}">
                            <div class="drop-zone  p-1 d-flex align-items-center justify-content-center" style="background: url({{asset('admin_avatar/'. $LoggedUserInfo['admin_avatar'])}});  background-size: cover; position: relative;background-repeat: no-repeat;">
                              <span class="drop-zone__prompt text-center"><i class="fa-solid fa-circle-plus" style="font-size:50px; color:#fff;"></i></span>
                              <input type="file" name="admin_avatar" class="drop-zone__input">
                              </div>
                              <div class="d-flex justify-content-end">
                                <div class="d-flex">
                                    <div class="mr-1"><a href="" class="btn btn-block btn-light border border-1 btn-flat" role="button">Bekor</a></div>
                                    <button class="btn btn-flat btn-success" type="submit">O‘zgartirish</button>
                                </div>
                            </div>
                          </form>
                             </div>
                             
                      </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
            </div>
        </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
@endsection