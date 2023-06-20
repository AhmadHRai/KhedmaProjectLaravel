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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone </th>
                      @if (auth()->user()->role== 1)
                      <th>Mang</th>
                      @endif
                    </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">  @if ($user->status == 1)  {{ $i }}  @else <p style="color: red">{{ $i }}</p>  @endif </th>
                                @php $i++; @endphp
                                <td> {{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                  @if ($user->role >=2)
                                  <a href="{{'/dsadmin/user/' . $user->id }}" class="btn btn-xs btn-success btn-sm">
                                    <i class="fa fa-eye"></i>
                                  </a>
                                  @endif
                                    {{-- Edit --}}
                                    @if (auth()->user()->role== 1) 
                                      <a href="{{'/dsadmin/user/' . $user->id .'/edit'}}" class="btn btn-xs btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                      {{-- delete --}}
                                      <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$user->id}}, '{{ $user->name }}')" data-target="#logoutModal_imp" class="btn btn-xs btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                                    @endif
                                    <div class="modal modal-danger fade" id="logoutModal_imp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×  Ok </span>
                                                    </button>
                                                </div>
                                                <div class="delete-confirm">
                                                    <p id="question">
                                                        Do you sure
                                                    </p>
                                                    <p id="title-alert"></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal"> Cancel </button>
                                                    <form class="delete-confirm" action="" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="delete_lost btn btn-danger">Ok</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- delete end--}}
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
{{-- delete Logout script --}}
<script type="text/javascript">
    function deleteData(id, title)
 {
     var id = id;
     var title = title;
     var url = '/dsadmin/user/' + id ;
     url = url.replace(':id', id);
     $(".delete-confirm").attr('action', url);
     $("div.delete-confirm #title-alert").empty();
     $("div.delete-confirm #title-alert").append(title);
 }
  </script>
@endsection
