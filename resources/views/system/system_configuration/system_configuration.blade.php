@extends('layouts.app')
@section('title')
Tizim sozlamalari
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="/">Asosiy</a></li>
              <li class="breadcrumb-item active">Tizim sozlamalari</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content pb-5">
        <div>
            <div class="col-md-6">
                <div class="card card-outline card-primary shadow-none rounded-0 elevation-2">
                  <div class="card-header rounded-0 bg-white border-bottom-0">
                    <h3 class="card-title">Tizim Logosi</h3>
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool text-secondary" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    @foreach ($system_logo as $logo)
                    @if ($logo->system_logo !== 0)
                    <form action="/system/configuration/logo/update/{{$logo->id}}" method="POST" enctype="multipart/form-data">
                    @else
                    <form action="/system/configuration/logo" method="POST" enctype="multipart/form-data">
                    @endif
                    @endforeach
                        @csrf
                        <div>
                                <div class="drop-zone  d-flex align-items-center justify-content-center" style=" @foreach ($system_logo as $logo) background: url({{asset('system/system_logo/'. $logo->system_logo)}});
                                @endforeach background-size: cover; position: relative; background-repeat: no-repeat;">
                                    <span class="drop-zone__prompt text-center"><i class="fa-solid fa-circle-plus" style="font-size:50px;"></i></span>
                                    <input type="file" name="system_logo" class="drop-zone__input" >
                                    </div>
                                    <div class="d-flex ">
                                        <span class="text-danger">@error('system_logo')
                                            {{$message}}
                                        @enderror
                                    </span>
                                    </div>
                        </div>
                          <div class="d-flex justify-content-end mt-2">
                            <div class="d-flex">
                                <div class="mr-1"><a href="" class="btn btn-flat btn-light border border-1" role="button">Bekor</a></div>
                                <button class="btn btn-flat btn-success" type="submit">O‘zgartirish</button>
                            </div>
                        </div>
                      </form>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                {{-- <div class="card card-outline card-primary shadow-none rounded-0 elevation-2 collapsed-card"> 
                    <div class="card-header rounded-0 bg-white border-bottom-0">
                      <h3 class="card-title">OTM Markazlari</h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool text-secondary" data-card-widget="collapse">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form action="/system/configuration/section" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" >Nomi</label>
                            <input type="text" class="form-control rounded-0 @error('name') border border-danger @enderror" name="name" id="name">
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">@error('name')
                                    {{$message}}
                                @enderror
                            </span>
                            </div>
                          </div>
                          <div class="d-flex justify-content-end">
                            <button class="btn btn-flat btn-success" type="submit">Saqlash</button>
                        </div>
                      </form>
                      <ul class="todo-list ui-sortable mt-2" data-widget="todo-list">
                        @foreach ($system_section as $section)
                        <li>
                            <span class="handle ui-sortable-handle">
                              {{$section->section_id}}
                            </span>
                            <!-- todo text -->
                            <span class="text">{{$section->name}}</span>
                            <div class="tools">
                              <a href="/system/configuration/section/edit/{{$section->id}}"><i class="fas fa-edit text-primary"></i></a>
                              <i class="fas fa-trash-o"></i>
                            </div>
                            <div class="tools">
                                <a href="/system/configuration/section/delete/{{$section->id}}"><i class="fa-solid fa-trash-can text-danger"></i></a>
                                <i class="fas fa-trash-o"></i>
                              </div>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                    <!-- /.card-body -->
                  </div> --}}

              </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection