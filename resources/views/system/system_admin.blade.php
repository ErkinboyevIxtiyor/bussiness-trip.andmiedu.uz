@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/">Asosiy</a></li>
              <li class="breadcrumb-item active">Administrator</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div>
            <div class="card card-primary card-outline rounded-0">
        
              <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex">
                        <div><a href="/system/admin-add" type="button" class="btn btn-success btn-flat mr-1"><i class="fa-solid fa-plus"></i> Yaratish</a></div>
                        {{-- <div><a href="/system/admin-pdf" type="button" class="btn btn-block btn-success btn-flat"><i class="fa-regular fa-file"></i> PDF</a></div> --}}
                    </div>
                    <div class="col-md-6">
                      <form action="" method="GET">
                        <input type="text" class=" form-control rounded-0" placeholder="Familiya / Email / ID raqami bo‘yicha qidirish" name="search" value="{{$search}}">
                      </form>
                  </div>
                   </div>
              </div>
        
                <div class="card-body p-0">
                    <table id="" class="table table-striped  table-hover">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>Familiya</th>
                          <th>Rol</th>
                          <th>Email</th>
                          <th>Yaratilgan</th>
                          <th class="text-center">Holati</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($admin_data as $item)
                          <tr>
                            <th>{{$item->admin_id}}</th>
                            <td class="text-uppercase"><a href="/system/admin-edit/{{$item->id}}">{{$item->first_name}} {{$item->second_name}} {{$item->third_name}}</a></td>
                            <td>ADMINISTRATOR</td>
                            <td>{{$item->email}}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($item->created_at))}}</td>
                            <td class="text-center">
                              @if ($item->status == 1)
                              <a href="/system/admin/unpublished/{{$item->id}}" type="button"><i class=" text-success  fa-regular fa-square-check text-center" style="font-size: 25px"></i></a>
                              @else
                              <a href="/system/admin/published/{{$item->id}}" type="button"><i class=" text-danger fa-solid fa-xmark" style="font-size: 25px"></i></a>
                              @endif
                            </td> 
                          </tr>
                          @endforeach
                        </tbody>
                       
                      </table>
              </div>
          </div>
        </div>
        
    </section>
    <!-- /.content -->
</div>
@endsection