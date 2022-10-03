@extends('layouts.app')
@section('title'){{$admin_edit->second_name}} {{$admin_edit->first_name}} {{$admin_edit->third_name}}@endsection
@section('content')
<div class="content-wrapper p-2">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/">Asosiy</a></li>
              <li class="breadcrumb-item"><a href="/system/admin">Administrator</a></li>
              <li class="breadcrumb-item active text-uppercase">{{$admin_edit->second_name}} {{$admin_edit->first_name}} {{$admin_edit->third_name}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="col-md-6">
            <div class="card card-primary card-outline rounded-0">
                <div class="card-body card-header">
                    <div class="button col-md-4">
                        <a href="/system/account-edit/{{$admin_edit->id}}" type="button" class="btn btn-block btn-flat btn-success"><i class="fa-solid fa-pen-to-square"></i> O‘zgartirish</a>
                    </div>
                </div>
                <div class="">
                    <div class="card-body p-0">
                        <table id="w0" class="table table-striped table-bordered detail-view"><tbody><tr><th>Rasm</th><td>
                            @if ($admin_edit->admin_avatar == "")
                            <img class="img-circle w-25" src="{{asset('admin_avatar/admin_avatar.jpg')}}" alt="{{$LoggedUserInfo['second_name']}} {{$LoggedUserInfo['first_name']}}">
                            @else
                            <img class="img-circle" src="{{asset('admin_avatar/admin_avatar.jpg')}}" alt="{{$LoggedUserInfo['second_name']}} {{$LoggedUserInfo['first_name']}}">
                            @endif</td></tr>
                            <tr><th>Ismi</th><td class="text-uppercase">{{$admin_edit->first_name}}</td></tr>
                            <tr><th>Familiya</th><td class="text-uppercase" >{{$admin_edit->second_name}}</td></tr>
                            <tr><th>Otasining ismi</th><td class="text-uppercase" >{{$admin_edit->third_name}}</td></tr>
                            <tr><th>Email</th><td>{{$admin_edit->email}}</td></tr>
                            <tr><th>Rol</th><td>Administrator</td></tr>
                            <tr><th>Yaratilgan</th><td>{{ date('d-m-Y H:i:s', strtotime($admin_edit->created_at))}}</td></tr>
                            <tr><th>O‘zgartirilgan</th><td>{{ date('d-m-Y H:i:s', strtotime($admin_edit->updated_at))}}</td></tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="card card-primary card-outline rounded-0">
                <div class="card-body p-0">
                    <table id="w0" class="table table-striped table-bordered detail-view">
                        <tbody>
                        <tr><th>Ma‘lumot sarlavhasi</th><td class="">{{$admin_edit->second_name}} {{$admin_edit->first_name}} {{$admin_edit->third_name}}</td></tr>
                        <tr><th>Sinxronizatsiya statusi</th><td class="" >@if ($admin_edit->status == 1)
                            Aktual
                        @else
                            Aktual emas
                        @endif</td></tr>
                        <tr><th>Sinxronlash sanasi</th><td>{{ date('d-m-Y H:m:s', strtotime($admin_edit->updated_at))}}</td></tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        
    </section>
    <!-- /.content -->
</div>
@endsection