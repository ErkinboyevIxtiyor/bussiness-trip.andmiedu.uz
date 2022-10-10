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
                <li class="breadcrumb-item active">Qaytish belgilari tahrirlash
                </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="container">
        <div class="col-md-6">
          <div class="card card-primary card-outline rounded-0">
            <div class=" bg-info">
              <h4 class="modal-title ml-1">Qaytish belgilari tahrirlash</h4>
            </div>
            <div class="card-body">
              <form action="/bussiness-trip/date/{{$business_trip->id}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Kelgan</label>
                  <input type="text" class=" form-control rounded-0" name="arrival_adress" id="arrival_adress" value="Andijon shahar" disabled>
                </div>
                <div class="form-group">
                  <label for="arrival_date">Sana</label>
                  <div class="input-group date" id="reservationdate6" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input rounded-0 @error('arrival_date') border-danger @enderror" data-target="#reservationdate6" placeholder="Yil-Oy-Kun" name="arrival_date" id="arrival_date" value="{{$business_trip->arrival_date}}">
                    <div class="input-group-append rounded-0" data-target="#reservationdate6" data-toggle="datetimepicker">
                <div class="input-group-text rounded-0"><i class="fa fa-calendar"></i></div>
                    </div>
                 </div>
                </div>
                <div class="d-flex justify-content-end">
                  <div>
                    <a href="/bussiness-trip/date" class="btn btn-flat btn-light border border-1">Bekor</a>
                    <button class="btn btn-flat btn-success" type="submit">Saqlash</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

</div>
@endsection