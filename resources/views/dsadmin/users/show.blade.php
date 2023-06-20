@extends('layouts.app')

@section('content')

  <!-- index -->
  <div class="content-wrapper">
    <!-- nav index -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/dsadmin">Home</a></li>
              <li class="breadcrumb-item active">{{$namepage}}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.nav index -->
    <!-- /.content-index -->

              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  @if (auth()->user()->role== 1)
                  <a href="{{ url('/dsadmin/user/create/') }}"><button type="button" class="btn btn-info btn-sm"  style="float: right;">  Add new <i class="fa fa-plus"></i></button></a>
                  @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Title</th>
                      <th>Date Start</th>
                      <th>Date End</th>
                      <th>price </th>
                      <th>status </th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">  @if ($user->status == 1)  {{ $i }}  @else <p style="color: red">{{ $i }}</p>  @endif </th>
                                @php $i++; @endphp
                                <td> {{$user->title}}</td>
                                <td>{{$user->date_start}}</td>
                                <td>{{$user->date_end}}</td>
                                <td>{{$user->price}}</td>
                                <td>
                                  @if ($user->status == 0)
                                    No
                                @else
                                   OK
                                @endif
                              </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

    <!-- /.content-index -->
  </div>
<!-- /.index -->
<div class="row">
    <div class="col-md-12 d-flex justify-content-center">
        {{$users->links()}}
    </div>
</div>

@endsection
