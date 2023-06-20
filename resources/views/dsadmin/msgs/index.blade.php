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
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($msgs as $msg)                      
                            <tr>
                                <th scope="row">  @if ($msg->cases == 0)  {{ $i }}  @else <p style="color: red">{{ $i }}</p>  @endif </th>
                                @php $i++; @endphp
                                <td>
                                  <a type="button" href="#" data-lity data-lity-target="{{'/dsadmin/msg/' . $msg->id }}">
                                    {{$msg->name}}
                                  </a>
                                </td>
                                <td>{{$msg->email}}</td>

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
        {{$msgs->links()}}
    </div>
</div>

@endsection
