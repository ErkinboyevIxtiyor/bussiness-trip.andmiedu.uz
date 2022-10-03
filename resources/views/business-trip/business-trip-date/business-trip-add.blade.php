@extends('layouts.app')
@section('title')
Xizmat safari bazasi
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="/">Asosiy</a></li>
                <li class="breadcrumb-item"><a href="/bussiness-trip/date">Xizmat safari bazasi</a></li>
                <li class="breadcrumb-item active">Xizmat safarini yaratish</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="container">
        <div class="card card-primary card-outline rounded-0">
            <div class="card-body p-0">
              <table class="table ">
                <thead>
                   <tr>
                    <th>#</th>
                    <th>ID raqami</th>
                    <th>Familiya</th>
                    <th class="text-center">Lavozimi</th>
                    <th class="text-center">Passport raqami</th>
                    {{-- <th>O‘zgartirilgan</th> --}}
                    <th >Yaratish</th>
                   </tr>
                </thead>
                <tbody>
                  @foreach ($employee as $item)
                  @if ($item->status == 1)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$item->employee_id}}</td>
                    <td class=" text-uppercase "><a href="/employee/employee/edit/{{$item->id}}">{{$item->second_name}} {{$item->first_name}} {{$item->third_name}}</a></td>
                    <td class="text-center">@foreach ($position as $employee_position)
                        @if ($employee_position->id == $item->position_id)
                            {{$employee_position->name}}
                        @endif
                    @endforeach</td>
                    <td class="text-center">{{$item->employee_passport}}</td>
                    {{-- <td>{{$item->updated_at}}</td> --}}
                    <td class="text-center">
                      <a href="/bussiness-trip/add/{{$item->id}}" type="button" class="btn btn-flat btn-block btn-light border border-1"><i class="fa-solid fa-square-plus"></i> Yaratish</a>
                    </td>
                  </tr> 
                  @endif
                  @endforeach
                </tbody>
            </table>
            </div>
        </div>
      </section>

</div>
@endsection