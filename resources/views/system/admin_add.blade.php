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
              <li class="breadcrumb-item"><a href="/system/admin">Administrator</a></li>
              <li class="breadcrumb-item active">Administrator yaratish</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary card-outline rounded-0">
            <div class="card-body">
               <form action="/system/admin/save" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="second_name">Familiyasi</label>
                            <input type="text" class="form-control rounded-0 @error('second_name') border-danger @enderror" id="second_name" placeholder="" name="second_name" value="{{old('second_name')}}">
                            <div class="d-flex align_items-center justify-content-end">
                                @error('second_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="first_name">Ismi</label>
                            <input type="text" class="form-control rounded-0 @error('first_name') border-danger @enderror" id="first_name" placeholder="" name="first_name" value="{{old('first_name')}}">
                            <div class="d-flex align_items-center justify-content-end">
                                @error('first_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="third_name">Otasining ismi</label>
                            <input type="text" class="form-control rounded-0 @error('third_name') border-danger @enderror" id="third_name" placeholder="" name="third_name" value="{{old('third_name')}}">
                            <div class="d-flex align_items-center justify-content-end">
                                @error('third_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control rounded-0 @error('email') border-danger @enderror" id="email" placeholder="" name="email" value="{{old('email')}}">
                            <div class="d-flex align_items-center justify-content-end">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password">Parol</label>
                            <input type="password" class="form-control rounded-0 @error('password') border-danger @enderror" id="password" placeholder="" name="password" value="">
                            <div class="d-flex align_items-center justify-content-end">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="repassword">Parol tasdig‘i</label>
                            <input type="password" class="form-control rounded-0 @error('repassword') border-danger @enderror" id="repassword" placeholder="" name="repassword" value="">
                            <div class="d-flex align_items-center justify-content-end">
                                @error('repassword')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="d-flex">
                        <div class="mr-1"><a href="/system/admin" class="btn btn-block btn-flat btn-light border border-1" role="button">Bekor</a></div>
                        <button class="btn btn-block btn-flat btn-success" type="submit">O‘zgartirish</button>
                    </div>
                </div>
               </form>
            </div>
        </div>
        
    </section>
    <!-- /.content -->
</div>
@endsection