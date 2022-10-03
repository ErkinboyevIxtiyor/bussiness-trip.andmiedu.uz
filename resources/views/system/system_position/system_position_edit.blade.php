@extends('layouts.app')
@section('title')
Tizim lavozimlari
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
              <li class="breadcrumb-item active">Tizim lavozimlari</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content pb-5">
           <div class="row">
            <div class="col-md-8">
              <div class="card card-primary card-outline rounded-0">
                <div class="card-body p-0">
                  <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Nomi</th>
                        <th class="text-center">Holati</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($position as $item)
                      <tr>
                        <td>{{$loop->index+1}}</td>
                        <td><a href="/system/position/edit/{{$item->id}}">{{$item->position_id}}</a></td>
                        <td><a href="/system/position/edit/{{$item->id}}">{{$item->name}}</a></td>
                        <td class="text-center">
                          @if ($item->status == 1)
                          <a href="/system/position/unpublished/{{$item->id}}" type="button"><i class=" text-success  fa-regular fa-square-check" style="font-size: 25px"></i></a>
                          @else
                          <a href="/system/position/published/{{$item->id}}" type="button"><i class=" text-danger fa-solid fa-xmark" style="font-size: 25px"></i></a>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-primary card-outline rounded-0">
                <div class="card-body">
                  <form action="/system/position/update/{{$position_edit->id}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="name">Nomi</label>
                      <input type="text" class="form-control rounded-0" name="name" id="name" value="{{$position_edit->name}}">
                      <div class="d-flex justify-content-end">
                        <span class="text-danger">
                          @error('name')
                              {{$message}}
                          @enderror
                        </span>
                      </div>
                    </div>
                    {{-- <div class="form-group">
                      <label for="position">Nomi</label>
                      <select class="faculty_select" name="position" id="position" style="width: 100%">
                        <option value="Bo‘lim" @if ($position_edit->position == 'Bo‘lim') selected @endif>Bo‘lim</option>
                        <option value="Kafedra" @if ($position_edit->position == 'Kafedra') selected @endif>Kafedra</option>
                      </select>
                      <div class="d-flex justify-content-end">
                        <span class="text-danger">
                          @error('position')
                          {{$message}}
                      @enderror</span>
                      </div>
                    </div> --}}
                    <div class="d-flex justify-content-end">
                      <a href="/system/position" class="btn btn-flat btn-light border border-1 mr-1">Bekor</a>
                      {{-- <a href="/system/position/delete/{{$position_edit->id}}" class=" btn btn-flat btn-danger mr-1">O‘chirish</a> --}}
                      <button type="submit" class="btn btn-flat btn-success">Saqlash</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card card-primary card-outline rounded-0">
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <tr>
                      <td>Ma‘lumot sarlavhasi</td>
                      <td>{{$position_edit->name}}</td>
                    </tr>
                    <tr>
                      <td>Statusi</td>
                      <td>@if ($position_edit->status == 1)
                        Faol
                        @else
                        Nofaol
                        @endif</td>
                    </tr>
                    <tr>
                      <td>Yaratilgan</td>
                      <td>{{date('d-m-Y H:i:s', strtotime($position_edit->created_at))}}</td>
                    </tr>
                    <tr>
                      <td>O‘zgartirilgan</td>
                      <td>{{date('d-m-Y H:i:s', strtotime($position_edit->updated_at))}}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
           </div>
    </section>
    <!-- /.content -->
</div>
@endsection