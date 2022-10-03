
@section('title')
Xodimlar bazasi
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="/">Asosiy</a></li>
                <li class="breadcrumb-item active">Xodimlar bazasi</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="container">
        <div class="card card-primary card-outline rounded-0">
            <div class=" border-bottom">
                <div class="row p-2">
                    <div class="col-md-4">
                        <a href="/employee/employee/add" type="button" class="btn btn-flat btn-success" ><i class="fa-solid fa-circle-plus"></i> Xodim qo‘shish</a>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <form action="/employee/employee-search" method="get" class="d-flex">
                              <input type="search" class=" form-control rounded-0" placeholder="Ism / Pasport / Xodim ID bo‘yicha qidirish" name="search_employee" value="{{old('search_employee')}}">
                              <div class="ml-1">
                                <button class="btn btn-flat btn-primary" type="submit">Qidirish</button>
                              </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="/employee/employee/export" type="button" class="btn btn-flat btn-success" ><i class="fa-solid fa-download"></i> Export xodim</a>
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
                        <th>O‘zgartirilgan</th>
                        <th >Holadi</th>
                       </tr>
                    </thead>
                    <tbody>
                      @foreach ($employee as $item)
                      <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$item->employee_id}}</td>
                        <td class=" text-uppercase "><a href="/employee/employee/edit/{{$item->id}}">{{$item->second_name}} {{$item->first_name}} {{$item->third_name}}</a></td>
                        <td class="text-center">{{$item->employee_passport}}</td>
                        <td>{{$item->updated_at}}</td>
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
      </section>

</div>
@endsection