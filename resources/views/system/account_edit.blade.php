@extends('layouts.app')
@section('title'){{$admin_edit->second_name}} {{$admin_edit->first_name}} {{$admin_edit->third_name}}@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/">Asosiy</a></li>
              <li class="breadcrumb-item"><a href="/system/admin">Administrator</a></li>
              <li class="breadcrumb-item text-uppercase"><a href="/system/admin-edit/{{$admin_edit->id}}">{{$admin_edit->second_name}} {{$admin_edit->first_name}} {{$admin_edit->third_name}}</a></li>
              <li class="breadcrumb-item active">O‘zgartirish</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="col-md-6">
            <div class="card card-primary card-outline card-tabs rounded-0">
              
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Shaxsiy maʼlumot</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">So‘zlamalar</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Profil surati</a>
                  </li> --}}
                </ul>
               
              </div>
              
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                      <form action="/profil-update/{{$admin_edit['id']}}" method="POST">
                          @csrf
                          <div class="form-group">
                              <label for="second_name">Familiyasi</label>
                              <input type="text" class="form-control rounded-0" id="second_name" placeholder="" name="second_name" value="{{$admin_edit['second_name']}}" disabled>
                          </div>
                          <div class="form-group">
                              <label for="first_name">Ismi</label>
                              <input type="text" class="form-control rounded-0" id="first_name" placeholder="" name="first_name" value="{{$admin_edit['first_name']}}" disabled>
                          </div>
                          <div class="form-group">
                              <label for="third_name">Otasining ismi</label>
                              <input type="text" class="form-control rounded-0" id="third_name" placeholder="" name="third_name" value="{{$admin_edit['third_name']}}" disabled>
                          </div>
                          <div class="d-flex justify-content-end">
                              <div class="d-flex">
                                  <div class="mr-1"><a href="" class="btn btn-block btn-flat btn-light border border-1 btn-info" role="button">Bekor</a></div>
                                  {{-- <button class="btn btn-block btn-outline-success" type="submit">O‘zgartirish</button> --}}
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                      <form action="/account-update/{{$admin_edit['id']}}" method="POST">
                          @csrf
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="text" class="form-control rounded-0 @error('email') border-danger @enderror" id="email" placeholder="" name="email" value="{{$admin_edit['email']}}" disabled>
                              <span class="text-danger .span-uppercase">@error('email')
                                  {{$message}}
                              @enderror</span>
                          </div>
                          <div class="form-group">
                              <label for="password">Parolni o‘zgartirish </label>
                              <input type="password" class="form-control rounded-0 @error('password') border-danger @enderror" id="password" placeholder="Yangi parol" name="password" >
                              <span class="text-danger span-uppercase">@error('password')
                                  {{$message}}
                              @enderror</span>
                          </div>
                          <div class="form-group">
                              <label for="repassword">Parol tasdig‘i </label>
                              <input type="password" class="form-control rounded-0 @error('repassword') border-danger @enderror" id="repassword" placeholder="Parol tasdig‘i" name="repassword">
                              <span class="text-danger span-uppercase">
                                  @error('repassword')
                                  {{$message}}
                              @enderror
                          </span>
                          </div>
                          <div class="d-flex justify-content-end">
                              <div class="d-flex">
                                  <div class="mr-1"><a href="" class="btn btn-block btn-flat border border-1 btn-light" role="button">Bekor</a></div>
                                  <button class="btn btn-block btn-flat btn-success" type="submit">O‘zgartirish</button>
                              </div>
                          </div>
                      </form>
                  </div>
                  {{-- <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                     <form action="/profil-avatar-update/{{$admin_edit['id']}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" class="form-control" id="full_name" placeholder="" name="full_name" value="{{$admin_edit['second_name']}}_{{$admin_edit['first_name']}}">
                      <div class="drop-zone  p-1 d-flex align-items-center justify-content-center">
                        <span class="drop-zone__prompt text-center">Faylni shu yerga tashlang yoki yuklash uchun bosing</span>
                        <input type="file" name="admin_avatar" class="drop-zone__input">
                        </div>
                        <div class="d-flex justify-content-end">
                          <div class="d-flex">
                              <div class="mr-1"><a href="" class="btn btn-block btn-outline-info" role="button">Bekor</a></div>
                              <button class="btn btn-block btn-outline-success" type="submit">O‘zgartirish</button>
                          </div>
                      </div>
                    </form>
                       </div> --}}
                       
                </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
      </div>
        
        
    </section>
    <!-- /.content -->
</div>
@endsection