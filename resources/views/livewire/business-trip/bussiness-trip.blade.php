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
                <li class="breadcrumb-item active">Xizmat safaririni yaratish</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="container">
        <div class="card card-primary card-outline rounded-0">
            <div class="bg-info">
              <h3 class="ml-1">Shaxsiy Ma‘lumot</h3>
            </div>
            <div class="card-body">
              <form action="{{route('business-trip.save')}}" method="post">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="employee_id">Xodim</label>
                      <select name="employee_id" id="employee_id" class="" style="width: 100%" wire:model="employee_id">
                       @foreach ($employee as $item)
                       <option value="{{$item->id}}" class="">{{$item->second_name}} {{$item->first_name}} {{$item->third_name}}</option>
                       @endforeach                      
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="position_id">Lavozimi</label>
                      <select name="employee_position" id="position_id" class="" style="width: 100%" wire:model="position_id">
                        @foreach ($position_date as $item_position)
                        <option value="{{$item_position->id}}" class="">{{$item_position->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  {{-- <div class="col-md-4">
                    <div class="form-group">
                      <label for="employee_passport">Passport raqami</label>
                     
                      <input type="text" class="form-control rounded-0" id="employee_passport" value="">

                    </div>
                  </div> --}}
                </div>
              </form>
            </div>
        </div>
      </section>

</div>
@endsection