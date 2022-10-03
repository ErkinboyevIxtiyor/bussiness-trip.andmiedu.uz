@extends('layouts.app')
@section('title')
{{$employee->second_name}} {{$employee->first_name}} {{$employee->third_name}}
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="/">Asosiy</a></li>
                <li class="breadcrumb-item"><a href="/employee/employee">Xodimlar bazasi</a></li>
                <li class="breadcrumb-item text-uppercase active">{{$employee->second_name}} {{$employee->first_name}} {{$employee->third_name}}</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="container">
        <div class="card card-primary card-outline rounded-0">
          <div class="bg-info ">
            <h3 class="ml-1">Shaxsiy Maʼlumot</h3>
          </div>
            <div class="card-body">
              <form action="/employee/employee/update/{{$employee->id}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="second_name">Familiya</label>
                      <input type="text" class="form-control rounded-0" id="second_name" name="second_name" value="{{$employee->second_name}}">
                      <div class="d-flex justify-content-end">
                        <span class="text-danger">@error('second_name')
                          {{$message}}
                        @enderror</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="first_name">Ismi</label>
                      <input type="text" class="form-control rounded-0" id="first_name" name="first_name" value="{{$employee->first_name}}">
                      <div class="d-flex justify-content-end">
                        <span class="text-danger">@error('first_name')
                          {{$message}}
                        @enderror</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="third_name">Otasining ismi</label>
                      <input type="text" class="form-control rounded-0" id="third_name" name="third_name" value="{{$employee->third_name}}">
                      <div class="d-flex justify-content-end">
                        <span class="text-danger">@error('third_name')
                          {{$message}}
                        @enderror</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="employee_passport">Pasport raqami</label>
                      <input type="text" class="form-control rounded-0" id="employee_passport" name="employee_passport" data-inputmask='"mask": "AA9999999"' data-mask value="{{$employee->employee_passport}}">
                      <div class="d-flex justify-content-end">
                        <span class="text-danger">@error('employee_passport')
                          {{$message}}
                        @enderror</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="position_id">Lavozim</label>
                      <select name="position_id" id="position_id" class="position_select" style="width: 100%">
                        @foreach ($position as $item)
                        @if ($item->status == 1)
                        <option value="{{$item->id}}"
                          @if ($item->id == $employee->position_id) selected @endif>{{$item->name}}
                        </option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="emplayee_gender">Jinsi</label>
                      <select name="employee_gender" id="employee_gender" class="faculty_select rounded-0" style = "width:100%; border-radius: 0px;">
                        <option value="Erkak" 
                        @if ($employee->employee_gender == "Erkak") selected @endif>Erkak</option>
                        <option value="Ayol" @if ($employee->employee_gender == "Ayol") selected @endif>Ayol</option>
                      </select>
                      <div class="d-flex justify-content-end">
                        <span class="text-danger">@error('emplayee_gender')
                          {{$message}}
                        @enderror</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <div class="mr-1">
                    <a href="" class="btn btn-flat btn-light border border-1">Bekor</a>
                  </div>
                  <button type="submit" class="btn btn-flat btn-success">Saqlash</button>
                </div>
              </form>
            </div>
        </div>
      </section>

</div>
@endsection