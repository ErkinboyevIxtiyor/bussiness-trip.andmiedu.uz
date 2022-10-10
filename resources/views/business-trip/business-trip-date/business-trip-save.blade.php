@extends('layouts.app')
@section('title')
{{$employee_add->second_name}} {{$employee_add->first_name}} {{$employee_add->third_name}}
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
                <li class="breadcrumb-item"><a href="/bussiness-trip/add">Xizmat safarini yaratish</a></li>
                <li class="breadcrumb-item active">{{$employee_add->second_name}} {{$employee_add->first_name}} {{$employee_add->third_name}}</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="container">
        <form action="/bussiness-trip/save" method="post">
          @csrf
          <div class="card card-primary card-outline rounded-0">
            <div class="bg-info">
              <h3 class="ml-1">Shaxsiy ma‘lumot</h3>
            </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <input type="hidden" value="{{$employee_add->id}}" name="employee_id">
                    <input type="hidden" value="{{$employee_add->second_name}} {{$employee_add->first_name}} {{$employee_add->third_name}}" name="employee_full_name">
                    <div class="form-group">
                      <label for="employee">Xodim</label>
                      <input type="text" value="{{$employee_add->second_name}} {{$employee_add->first_name}} {{$employee_add->third_name}}" class="form-control rounded-0" id="employee" disabled>
                    </div>
                  </div>
                  <div class="col-md-4">
                    @foreach ($position as $item)
                        @if ($item->id == $employee_add->position_id)
                            <input type="hidden" value="{{$item->name}}" name="employee_position">
                        @endif
                    @endforeach
                    <div class="form-group">
                      <label for="employee_position">Lavozim</label>
                      @foreach ($position as $item)
                        @if ($item->id == $employee_add->position_id)
                      <input type="text" value="{{$item->name}}" class="form-control rounded-0" id="employee_position" disabled>
                      @endif
                      @endforeach
                    </div>
                  </div>
                  <div class="col-md-4">
                    <input type="hidden" value="{{$employee_add->employee_passport}}" class="form-control rounded-0" name="employee_passport">
                    <div class="form-group">
                      <label for="employee_passport">Passport raqami</label>
                      <input type="text" value="{{$employee_add->employee_passport}}" class="form-control rounded-0" disabled>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-info">
                <h3 class="ml-1">Xizmat safari ma‘lumoti</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="trip_adress">Xizmat safari punkti</label>
                      <input type="text" class="form-control rounded-0 @error('trip_adress') border-danger @enderror" name="trip_adress" id="trip_adress" placeholder="Toshkent Transport universiteti" value="{{old('trip_adress')}}">
                      <div class="d-flex justify-content-end">
                        @error('trip_adress')
                        <span class="text-danger">Xizmat safari punkti bo‘sh bo‘lishi mumkun emas</span>
                        @enderror
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="trip_day">Xizmat safari kuni</label>
                      <div class="input-group">
                        <!-- /btn-group -->
                        <input type="text" class="form-control @error('trip_days') border-danger @enderror rounded-0" name="trip_days" placeholder="3" value="{{old('trip_days')}}">
                        <div class="input-group-prepend">
                          <select name="trip_day" id="" class="employee_select" style="width: 100%">
                            <option value="Kun">Kun</option>
                            <option value="Oy">Oy</option>
                            <option value="Yil">Yil</option>
                          </select>
                        </div>
                      </div>
                      <div class="d-flex justify-content-end">
                        @error('trip_days')
                        <span class="text-danger">Xizmat safari kuni bo‘sh bo‘lishi mumkun emas</span>
                        @enderror
                      </div>
                    </div>
                  </div>
  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="trip_begin_date">Xizmat safarini boshlanish sanasi</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input rounded-0 @error('trip_begin_date') border-danger @enderror" data-target="#reservationdate" placeholder="Yil-Oy-Kun" name="trip_begin_date" id="trip_begin_date" value="{{old('trip_begin_date')}}">
                        <div class="input-group-append rounded-0" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text rounded-0"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                      @error('trip_begin_date')
                      <span class="text-danger">Xizmat safarini boshlanish sanasi bo‘sh bo‘lishi mumkun emas</span>
                      @enderror
                    </div>
                    </div>
                  </div>
  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="trip_end_date">Xizmat safarini tugash sanasi</label>
                      <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input rounded-0 @error('trip_end_date') border-danger @enderror" data-target="#reservationdate2" data-inputmask-inputformat="yyyy-mm-dd" placeholder="Yil-Oy-Kun" name="trip_end_date" id="trip_end_date" value="{{old('trip_end_date')}}">
                        <div class="input-group-append rounded-0" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text rounded-0"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                      @error('trip_end_date')
                      <span class="text-danger">Xizmat safarini tugash sanasi bo‘sh bo‘lishi mumkun emas</span>
                      @enderror
                    </div>
                    </div>
                    
                  </div>
  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="order_date">Buyruq sanasi</label>
                      <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input rounded-0 @error('order_date') border-danger @enderror" data-target="#reservationdate3" placeholder="Yil-Oy-Kun" name="order_date" id="order_date" value="{{old('order_date')}}">
                        <div class="input-group-append rounded-0" data-target="#reservationdate3" data-toggle="datetimepicker">
                            <div class="input-group-text rounded-0"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                      @error('order_date')
                      <span class="text-danger">Buyruq sanasi bo‘sh bo‘lishi mumkun emas</span>
                      @enderror
                    </div>
                    </div>                   
      
                  </div>
  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="order_number">Buyruq raqami</label>
                      <input type="text" class="form-control text-uppercase rounded-0 @error('order_number') border-danger @enderror" id="order_number" placeholder="" name="order_number" value="{{old('order_number')}}">
                      <div class="d-flex justify-content-end">
                        @error('order_number')
                        <span class="text-danger">Buyruq raqami bo‘sh bo‘lishi mumkun emas</span>
                        @enderror
                      </div>
                    </div>
                    
                  </div>
  
                </div>
              </div>
              <div class="bg-info">
                <h3 class="ml-1">Tastiqlovchi ma‘sul xodim</h3>
              </div>
              <div class="card-body">
                <div class="row">
                 <div class="col-md-4">
                   <div class="form-group">
                     <label for="employee_responsible_position">Ma‘sul xodimning lavozimi</label>
                     <select class="form-control employee_select" style="width: 100%;" name="employee_responsible_position" id="employee_responsible_position" >
                      <option value="Rektor">Rektor</option>
                      <option value="Prorektor">Prorektor</option>
                    </select>
                    <div class="d-flex justify-content-end">
                      @error('employee_responsible_position')
                      <span class="text-danger">Ma‘sul xodimning lavozimi bo‘sh bo‘lishi mumkun emas</span>
                      @enderror
                    </div>
                   </div>    
    
                 </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="employee_responsible_name">Ma‘sul xodimning Ismi</label>
                    <input type="text" class="form-control text-uppercase rounded-0 @error('employee_responsible_name') border-danger @enderror" id="employee_responsible_name" placeholder="" name="employee_responsible_name" value="{{old('employee_responsible_name')}}">
                    <div class="d-flex justify-content-end">
                      @error('employee_responsible_name')
                      <span class="text-danger">Ma‘sul xodimning Ismi bo‘sh bo‘lishi mumkun emas</span>
                      @enderror
                    </div>
                  </div>
    
                </div>
                </div>
               </div>
               <div class="bg-info">
                <h3 class="ml-1">Xizmat safariga jonash ma‘lumoti</h3>
              </div>
              <div class="card-body">
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jo‘nagan manzili </label>
                    <input type="text" class="form-control rounded-0 @error('shipping_adress') border-danger @enderror" id="exampleInputEmail1" placeholder="Andijon shahar" name="shipping_adress" value="{{old('shipping_adress')}}">
                    <div class="d-flex justify-content-end">
                      @error('shipping_adress')
                      <span class="text-danger">Jo‘nagan manzili bo‘sh bo‘lishi mumkun emas</span>
                      @enderror
                    </div>
                  </div>
                
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="shipping_date">Jo‘nagan sanasi</label>
                    <div class="input-group date" id="reservationdate5" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input rounded-0 @error('shipping_date') border-danger @enderror" data-target="#reservationdate5" placeholder="Yil-Oy-Kun" name="shipping_date" id="shipping_date" value="{{old ('shipping_date')}}">
                      <div class="input-group-append rounded-0" data-target="#reservationdate5" data-toggle="datetimepicker">
                          <div class="input-group-text rounded-0"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                  <div class="d-flex justify-content-end">
                    @error('shipping_date')
                    <span class="text-danger">Jo‘nagan sanasi bo‘sh bo‘lishi mumkun emas</span>
                    @enderror
                  </div>
                  </div>
                  
                </div>
               </div>
               <div class="d-flex justify-content-end">
                <a href="/bussiness-trip/add" class="btn btn-light btn-flat border border-1 mr-1">Bekor</a>
                <button type="submit" class="btn btn-flat btn-success">Saqlash</button>
               </div>
              </div>
          </div>
        </form>
      </section>

</div>
@endsection