@extends('layouts.app')
@section('title')
{{$employee->second_name}} {{$employee->first_name}} {{$employee->third_name}}
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
       <div class="row">
        <div class="col-md-6">
          <div class="card card-primary card-outline rounded-0">
            <div class="border-bottom p-2">
              <a href="/employee/update/{{$employee->id}}" class="btn btn-flat btn-success"><i class="fa-solid fa-pen-to-square"></i> O‘zgartirish</a>
            </div>
            <div class="card-body p-0">
              <table class="table table-bordered table-striped">
                <tr>
                  <th>ID raqami</th>
                  <td>{{$employee->employee_id}}</td>
                </tr>
                <tr>
                  <th>Familiya</th>
                  <td class=" text-uppercase">{{$employee->second_name}}</td>
                </tr>
                <tr>
                  <th>ismi</th>
                  <td class=" text-uppercase">{{$employee->first_name}}</td>
                </tr>
                <tr>
                  <th>Otasining ismi</th>
                  <td class=" text-uppercase">{{$employee->third_name}}</td>
                </tr>
                 <tr>
                  <th>Lavozimi</th>
                  @foreach ($position as $item)
                  @if ($item->id == $employee->position_id)
                  <td>{{$item->name}}</td> 
                  @endif
                  @endforeach
                </tr>
                <tr>
                  <th>Passport raqami</th>
                  <td>{{$employee->employee_passport}}</td>
                </tr>
              </table>
            </div>
        </div>
        <div class="card card-primary card-outline rounded-0">
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <td>Maʼlumot sarlavhasi</td>
                  <td class=" text-uppercase ">{{$employee->second_name}} {{$employee->first_name}} {{$employee->third_name}}</td>
                </tr>
                <tr>
                  <td>Statusi</td>
                  <td>
                    @if ($employee->status == 1)
                        Faol
                    @else
                        Nofaol
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>O‘zgartirilgan</td>
                  <td>{{$employee->updated_at}}</td>
                </tr>
              </thead>
            </table>
          </div>
        </div>
        </div>
       
       </div>
      </section>

</div>
@endsection