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
              <li class="breadcrumb-item active">PDF</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div>
            <div class="card card-primary card-outline">
        
                <div class="card-body">
                    <table id="example2" class="table  table-hover">
                        <thead>
                        <tr>
                          <th>Login</th>
                          <th>Rol</th>
                          <th>Email</th>
                          <th>Holati</th>
                          <th>Yaratilgan</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($admin_data as $item)
                          <tr>
                            <td class="text-uppercase"><a href="/system/admin-edit/{{$item->id}}">{{$item->first_name}} {{$item->second_name}} {{$item->third_name}}</a></td>
                            <td>ADMINISTRATOR</td>
                            <td>{{$item->email}}</td>
                            <td>
                              @if ($item->status == 1)
                                  Faol
                              @else
                                  Nofaol
                              @endif
                            </td>
                            <td>{{ date('d-m-Y H:m:s', strtotime($item->created_at))}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                       
                      </table>
                      <div class="d-flex justify-content-end"><div><a href="/system/admin/pdf/download" class="btn btn-block btn-success" ><i class="fa-regular fa-file"></i> PDF yuklab olish</a></div></div>
              </div>
          </div>
        </div>
        
    </section>
    <!-- /.content -->
</div>
@endsection