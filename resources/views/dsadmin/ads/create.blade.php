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
              <li class="breadcrumb-item active"><a href="{{$urls}}">Ads </a></li>
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
                
                @unless (empty($ads->id))
                    @method('PUT')
                @endunless

                <div class="card-body">

                  <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title"  @if(empty($ads->id)) placeholder="Title"@else value="{{$ads->title}}" @endif required>                  
                  </div>

                  <div class="form-group">
                    <label for="img_path">Photo</label>
                    <input type="hidden" class="form-control" id="oldpath" name="oldpath" value="@if(empty($ads->id))@else{{$ads->img_path}}@endif">
                    @if(empty($ads->id))@else <img src="{{asset('storage/images/' . $ads->img_path)}}" alt="" width="40" height="40">@endif
                    <input type="file" class="form-control-file" id="img_path" name="img_path">
                  </div>

                  <div class="form-group">
                    <label for="body">Body </label>
                    <textarea id="body" class="form-control" name="body" rows="3">@if(empty($ads->id)) @else {{$ads->body}} @endif</textarea>
                  </div>
          
                  <div class="form-group">
                    <label for="orders">orders </label>
                    <input type="number" class="form-control" id="orders" name="orders" @if(empty($ads->id)) placeholder="orders"@else value="{{$ads->orders}}" @endif>
                  </div>

                  <div class="form-group">
                    <label for="type">Type </label>
                    <select class="form-control" id="type" name="type">
                        @if(empty($ads->id))
                                <option value="1" selected='selected'>Model photo</option>
                                {{-- <option value="2">اعلان جانبي</option> --}}
                                <option value="3">About us</option>
                        @else
                            @if ($ads->type == 1)
                                <option value="1" selected='selected'>Model photo</option>
                                {{-- <option value="2">اعلان جانبي</option> --}}
                            @elseif ($ads->type == 2)
                                {{-- <option value="2" selected='selected'>اعلان جانبي</option> --}}
                                <option value="1">Model photo</option>
                            @else
                                <option value="3" selected='selected'>About us </option>
                            @endif 
                        @endif
                    </select>
                  </div>

                  @if(empty($ads->id))
                  <div class="form-group">
                    <label for="status">
                      <input type="checkbox" name="status" checked> on 
                    </label>
                  </div> 
                  @else
                  <div class="form-group">
                    <label for="status">
                      <input type="checkbox" name="status" @if ($ads->status) checked @else @endif> on 
                    </label>
                  </div>
                  @endif

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">save</button>
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