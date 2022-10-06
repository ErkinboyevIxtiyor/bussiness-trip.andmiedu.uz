@extends('layouts.app')
@section('title')
Statistika
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
        <div class="col-md-6">
            <div class="card card-primary card-outline rounded-0">
                <div class="bg-info">
                    <h3 class="ml-1">Xizmat safari statistikasi</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>To‘liq ismi</th>
                                <th class="text-center">Soni</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($employee as $item)
                                        <tr>
                                              <td>{{$item->second_name}}</td>
                                              <td>
                                                <a href="">
                                                  @foreach ($business_trip as $value)
                                                  @if ($item->id == $value->employee_id)
                                                      {{$value->statistical}}
                                                  @endif
                                              @endforeach
                                            </a>
                                            </td>
                                        </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </section>

</div>
@endsection