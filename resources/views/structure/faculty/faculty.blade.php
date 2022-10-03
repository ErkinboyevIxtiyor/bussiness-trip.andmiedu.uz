@extends('layouts.app')
@section('title')
Fakultet
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
              <li class="breadcrumb-item active">Fakultet</li>
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
                       <th>Turi</th>
                       <th class="text-center">Holat</th>
                       
                     </tr>
                     </thead>
                     <tbody>
                      @foreach ($faculty_data as $faculty)
                      
                      <tr>
                        <td><a href="/structure/faculty/edit/{{$faculty->id}}">{{$faculty->faculty_id}}</a></td>
                        <td><a href="/structure/faculty/edit/{{$faculty->id}}">{{$faculty->faculty_name}}</a></td>
                        <td>{{$faculty->faculty_type}}</td>
                        <td class="text-center">
                          @if ($faculty->status == 1)
                          <a href="/structure/faculty/unpublished/{{$faculty->id}}" type="button"><i class=" text-success  fa-regular fa-square-check" style="font-size: 25px"></i></a>
                          @else
                          <a href="/structure/faculty/published/{{$faculty->id}}" type="button"><i class=" text-danger fa-solid fa-xmark" style="font-size: 25px"></i></a>
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
              <form action="/structure/faculty/save" method="POST">
                @csrf
                <div class="form-group">
                  <label for="faculty_name">Nomi</label>
                  <input type="text" class="form-control rounded-0 @error('faculty_name') border-danger @enderror" id="faculty_name" placeholder="" name="faculty_name">
                  <div class="d-flex justify-content-end">
                    <span class="text-danger">@error('faculty_name')
                        {{$message}}
                    @enderror</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="faculty_type">Turi</label>
                  <select name="faculty_type" id="faculty_type" class="faculty_select rounded-0" style = "width:100%; border-radius: 0px;">
                    <option value="Mahalliy">Mahalliy</option>
                    <option value="Qo‘shma">Qo‘shma</option>
                  </select>
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