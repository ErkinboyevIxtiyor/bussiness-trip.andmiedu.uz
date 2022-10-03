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
                <li class="breadcrumb-item active">Xizmat safari bazasi</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="container">
        <div class="card card-primary card-outline rounded-0">
            <div class=" border-bottom">
                <div class="row p-2">
                    <div class="col-md-3">
                        <a href="/bussiness-trip/add" type="button" class="btn btn-flat btn-success" ><i class="fa-solid fa-circle-plus"></i> Xizmat safarini qo‘shish</a>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                              <form action="/bussiness-trip/date-search" method="get" class="d-flex">
                                <input type="text" class=" form-control rounded-0" placeholder="Familiya / Pasport / ID raqami bo‘yicha qidirish" name="search" value="{{$search}}">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="/bussiness-trip/date/export" type="button" class="btn btn-flat btn-success" ><i class="fa-solid fa-download"></i> Export xizmat safari</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <table class="table ">
                <thead>
                   <tr>
                    <th>#</th>
                    <th>ID raqami</th>
                    <th>Familiya</th>
                    <th class="text-center">Lavozimi</th>
                    <th class="text-center">Passport raqami</th>
                    <th class="text-center">O‘zgartirilgan</th>
                    <th class="text-center">Yuklab olish</th>
                    <th >Holadi</th>
                   </tr>
                </thead>
                <tbody>
                  @foreach ($business_trip as $item)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$item->trip_id}}</td>                    
                    <td><a href="/bussiness-trip/edit/{{$item->id}}" class=" text-uppercase ">{{$item->employee_full_name}}</a></td>
                        
                    <td class="text-center">{{$item->employee_position}}</td>
                    <td class="text-center">{{$item->employee_passport}}</td>
                    <td class="text-center">{{date('d-m-Y H:i:s', strtotime($item->updated_at))}}</td>
                    <td class="text-center">
                      @if ($item->qr_code == "")
                      <a href="/bussiness-trip/pdf-creat/{{$item->id}}" class="btn btn-light border border-1 text-center">PDF yaratish</a>
                      @else
                      <a href="/bussiness-trip/pdf/{{$item->id}}" class="btn btn-light border border-1 text-center"><i class="fa-solid fa-download"></i></a>
                      @endif
                    </td>
                    <td class="text-center">
                      @if ($item->status == 1)
                      <a href="/bussiness/unpublished/{{$item->id}}" type="button"><i class=" text-success  fa-regular fa-square-check" style="font-size: 25px"></i></a>
                      @else
                      <a href="/bussiness/published/{{$item->id}}" type="button"><i class=" text-danger fa-solid fa-xmark" style="font-size: 25px"></i></a>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <div class="mt-3">
              <span>Jami xizmat safari soni: {{$business_trip_total}} ta</span>
            </div>
            </div>
        </div>
      </section>

</div>
@endsection