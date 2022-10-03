@extends('layouts.app')
@section('title')
Kafedra
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
              <li class="breadcrumb-item active">Kafedra</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
         <div class="card card-primary card-outline rounded-0">        
             <div class="card-body">
                 <table id="" class="table  table-hover">
                     <thead>
                     <tr>
                       <th>#</th>
                       <th>Nomi</th>
                       <th>Fakultet</th>
                       <th class="text-center">Holat</th>
                       
                     </tr>
                     </thead>
                     <tbody>
                      @foreach ($faculty_data as $faculty)
                      @foreach ($department_data as $department)
                      @if ($faculty->id == $department->faculty_id)
                      <tr>
                        <td><a href="/structure/department/edit/{{$department->id}}">{{$department ->faculty_section_id}}</a></td>
                        <td><a href="/structure/department/edit/{{$department->id}}">{{$department->name}}</a></td>
                        <td>{{$faculty->faculty_name}}</td>
                        <td class="text-center">
                          @if ($department->status == 1)
                          <a href="/structure/faculty/unpublished/{{$department->id}}" type="button"><i class=" text-success  fa-regular fa-square-check" style="font-size: 25px"></i></a>
                          @else
                          <a href="/structure/faculty/published/{{$department->id}}" type="button"><i class=" text-danger fa-solid fa-xmark" style="font-size: 25px"></i></a>
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach
                      @endforeach
                     </tbody>
                    
                   </table>
           </div>
       </div>
        </div>
        <div class="col-md-4">
         <div class="card card-primary card-outline rounded-0">        
             <div class="card-body">
              <form action="/structure/department/save" method="POST">
                @csrf
                <div class="form-group">
                  <label for="faculty_id">Fakultet</label>
                  <select name="faculty_id" id="faculty_id" class="faculty_select rounded-0" style = "width:100%;">
                    @foreach ($faculty_data as $faculty)
                    @if ($faculty->status == 1)
                    <option value="{{$faculty->id}}">{{$faculty->faculty_name}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="name">Nomi</label>
                  <input type="text" class="form-control rounded-0 @error('name') border-danger @enderror" id="name" placeholder="" name="name">
                  <div class="d-flex justify-content-end">
                    <span class="text-danger">@error('name')
                        {{$message}}
                    @enderror</span>
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <div class="d-flex">
                      <button class="btn btn-flat btn-success" type="submit">Saqlash</button>
                  </div>
              </div>
              </form>
           
             </div>
        </div>
     </div>
    </section>
    <!-- /.content -->
</div>
@endsection