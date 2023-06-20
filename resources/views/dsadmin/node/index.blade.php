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
              <li class="breadcrumb-item"><a href="/dsadmin">الرئيسية</a></li>
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
                @if (auth()->user()->role== 1)
                <div class="card-header">
                  <a href="{{ url('/dsadmin/node/create/') }}"><button type="button" class="btn btn-info btn-sm"  style="float: right;"> اظافة جديد <i class="fa fa-plus"></i></button></a>
                </div>
                @endif
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>الرقم</th>
                      <th>العنوان</th>
                      <th>القسم</th>
                      <th>الإدارة</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($nodes as $node)
                            <tr>
                                <th scope="row">  @if ($node->status == 1)  {{ $i }}  @else <p style="color: red">{{ $i }}</p>  @endif </th>
                                @php $i++; @endphp
                                <td>{{$node->title}}</td>
                                <td>{{$node->node_type->name}}</td>
                                <td>
                                    {{-- Edit --}}
                                    <a href="{{'/dsadmin/node/' . $node->id .'/edit'}}" class="btn btn-xs btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                                    {{-- delete --}}
                                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$node->id}}, '{{ $node->name }}')" data-target="#logoutModal_imp" class="btn btn-xs btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                                    <div class="modal modal-danger fade" id="logoutModal_imp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">× تأكيد الحذف </span>
                                                    </button>
                                                </div>
                                                <div class="delete-confirm">
                                                    <p id="question">
                                                        هل أنت متأكد من حذف
                                                    </p>
                                                    <p id="title-alert"></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal"> الغاء </button>
                                                    <form class="delete-confirm" action="" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="delete_lost btn btn-danger">تأكيد</button>
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
        {{$nodes->links()}}
    </div>
</div>
{{-- delete Logout script --}}
<script type="text/javascript">
    function deleteData(id, title)
 {
     var id = id;
     var title = title;
     var url = '/dsadmin/node/' + id ;
     url = url.replace(':id', id);
     $(".delete-confirm").attr('action', url);
     $("div.delete-confirm #title-alert").empty();
     $("div.delete-confirm #title-alert").append(title);
 }
  </script>
@endsection
