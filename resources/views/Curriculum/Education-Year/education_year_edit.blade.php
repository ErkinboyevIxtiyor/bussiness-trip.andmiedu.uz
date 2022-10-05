@extends('layouts.app')
@section('title')
{{$education_year_edit->name}}
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="/">Asosiy</a></li>
                <li class="breadcrumb-item"><a href="/curriculum/education-year">O‘quv yili</a></li>
                <li class="breadcrumb-item active">{{$education_year_edit->name}}</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary card-outline rounded-0">
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomi</th>
                                    <th>Joriy holati</th>
                                    <th>O‘zgartirilgan</th>
                                    <th class="text-center">Faol</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($education_year as $item)
                               <tr>
                                <td>{{$loop ->index+1}}</td>
                                <td><a href="/curriculum/education-year/edit/{{$item->id}}">{{$item->name}}</a></td>
                                <td>@if ($item->current_status == 1)
                                    Ha
                                @else
                                    Yo‘q
                                @endif</td>
                                <td>{{date('d-m-Y H:i:s', strtotime($item->updated_at))}}</td>
                                <td class="text-center">
                                    @if ($item->status == 1)
                                    <a href="/employee/employee/unpublished/{{$item->id}}" type="button"><i class=" text-success  fa-regular fa-square-check" style="font-size: 25px"></i></a>
                                    @else
                                    <a href="/employee/employee/published/{{$item->id}}" type="button"><i class=" text-danger fa-solid fa-xmark" style="font-size: 25px"></i></a>
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
                        <form action="/curriculum/education-year/update/{{$education_year_edit->id}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nomi</label>
                            <input type="text" class=" form-control rounded-0 " name="name" value="{{$education_year_edit->name}}">
                            @error('name')
                            <div class="d-flex justify-content-end">
                                <span class="text-danger"> {{$message}}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="current_status" @if ($education_year_edit->current_status == 1) checked @endif >
                                <label class="form-check-label text-bold" for="exampleCheck1">Joriy holati</label>
                              </div>
                              @error('current_status')
                              <div class="d-flex justify-content-end">
                                  <span class="text-danger"> {{$message}}</span>
                              </div>
                              @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-flat btn-success">Saqlash</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </section>

</div>
@endsection