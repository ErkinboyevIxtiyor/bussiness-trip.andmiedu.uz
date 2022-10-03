@extends('layouts.app')
@section('title')
Bo‘lim
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
              <li class="breadcrumb-item active">Bo‘lim</li>
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
                       <th>Bo‘linma turi</th>
                       <th class="text-center">Holat</th>
                       
                     </tr>
                     </thead>
                     <tbody>
                      @foreach ($system_section as $item)
                      @foreach ($section_data as $section)
                      @if ($item->id == $section->system_section_id)
                      <tr>
                        <td><a href="/structure/section/edit/{{$section->id}}">{{$section ->section_id}}</a></td>
                        <td><a href="/structure/section/edit/{{$section->id}}">{{$section->section_name}}</a></td>
                        <td>{{$item->name}}</td>
                        <td class="text-center">
                          @if ($section->status == 1)
                          <a href="/structure/section/unpublished/{{$section->id}}" type="button"><i class=" text-success  fa-regular fa-square-check" style="font-size: 25px"></i></a>
                          @else
                          <a href="/structure/section/published/{{$section->id}}" type="button"><i class=" text-danger fa-solid fa-xmark" style="font-size: 25px"></i></a>
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
              <form action="/structure/section/save" method="POST">
                @csrf
                <div class="form-group">
                  <label for="system_section_id">Bo'linma turi</label>
                  <select name="system_section_id" id="system_section_id" class="faculty_select rounded-0" style = "width:100%;">
                    @foreach ($system_section as $section)
                    <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="section_name">Nomi</label>
                  <input type="text" class="form-control rounded-0 @error('section_name') border-danger @enderror" id="section_name" placeholder="" name="section_name">
                  <div class="d-flex justify-content-end">
                    <span class="text-danger">@error('section_name')
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