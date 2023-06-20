@extends('layouts.app')

@section('content')

  <!-- nav -->
  <div class="content-wrapper">
    <!-- nav index -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/dsadmin">Home </a></li>
              <li class="breadcrumb-item active"><a href="{{$urls}}">Type Jops </a></li>
              <li class="breadcrumb-item ">{{$namepage}} </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- nav end -->

    {{-- content --}}
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$namepage}} </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{$fromUrl}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                @unless (empty($type_job->id))
                    @method('PUT')
                @endunless

                <div class="card-body">

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name"  @if(empty($type_job->id)) placeholder="name"@else value="{{$type_job->name}}" @endif required>                  
                  </div>

                  <div class="form-group">
                    <label for="path">Phone</label>
                    <input type="hidden" class="form-control" id="oldpath" name="oldpath" value="@if(empty($type_job->id))@else{{$type_job->path}}@endif">
                    @if(empty($type_job->id))@else <img src="{{asset('storage/images/' . $type_job->path)}}" alt="" width="40" height="40">@endif
                    <input type="file" class="form-control-file" id="path" name="path">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>

            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

    {{-- content end --}}

@endsection