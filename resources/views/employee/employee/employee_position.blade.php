@extends('layouts.app')
@section('title')
Xodim yaratish
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="/">Asosiy</a></li>
                <li class="breadcrumb-item"><a href="/employee/employee">Xodimlar bazasi</a></li>
                <li class="breadcrumb-item active text-uppercase">{{$employee->second_name}} {{$employee->first_name}} {{$employee->third_name}}</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="container">
        <div class="col-md-6">
          <div class="card card-primary card-outline rounded-0">
            <div class="card-body">
              <form action="/employee/position/save" method="POST">
                @csrf
                <div class="">
                  <div class="">
                    <div class="form-group">
                      <label for="employee_id">Xodim</label>
                      <select name="employee_id" id="employee_id" class="employee_select form-control form-select" style="width: 100%; text-transform: uppercase;">
                        <option value="{{$employee->id}}">{{$employee->second_name}} {{$employee->first_name}} {{$employee->third_name}}</option>
                      </select>
                      <div class="d-flex justify-content-end">
                        <span class="text-danger">@error('employee_id')
                          {{$message}}
                        @enderror</span>
                      </div>
                    </div>
                  </div>
                  <div class="">
                    <div class="form-group">
                      <label for="position_id">Lavozim</label>
                      <select name="position_id" class="position_select" id="position_id" style="width: 100%">
                        @foreach ($position as $item)
                            @if ($item->position == 'Bo‘lim')
                               <option value="{{$item->id}}">{{$item->name}}</option> 
                            @endif
                        @endforeach
                      </select>
                      <div class="d-flex justify-content-end">
                        <span class="text-danger">@error('position_id')
                          {{$message}}
                        @enderror</span>
                      </div>
                    </div>
                  </div>
                  <div class="">
                    <div class="form-group">
                      <label for="section_id">Bo‘lim</label>
                      <select name="section_id" id="section_id" class="position_select" style="width: 100%">
                        @foreach ($section as $item)
                            <option value="{{$item->id}}">{{$item->section_name}}</option>
                        @endforeach
                      </select>
                      <div class="d-flex justify-content-end">
                        <span class="text-danger">@error('section_id')
                          {{$message}}
                        @enderror</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <div class="mr-1"><a href="" class="btn btn-flat btn-light border border-1">Bekor</a></div>
                  <button type="submit" class="btn btn-flat btn-success">Saqlash</button>
                </div>
              </form>
            </div>
        </div>
        </div>
      </section>

</div>
@endsection