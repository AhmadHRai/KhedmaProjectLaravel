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
              <li class="breadcrumb-item active"><a href="{{$urls}}">Users  </a></li>
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
                <h3 class="card-title">{{$namepage}} New</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{$fromUrl}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                @unless (empty($user->id))
                    @method('PUT')
                @endunless

                <div class="card-body">

                  <div class="form-group">
                    {{-- <label for="path">Photo</label> --}}
                    <input type="hidden" class="form-control" id="oldpath" name="oldpath" value="@if(empty($user->id))@else{{$user->path}}@endif">
                    @if(empty($user->id))@else <img src="{{asset('storage/images/' . $user->path)}}" alt="" width="400" height="400">@endif
                    @if(empty($user->id))@else <img src="{{asset('storage/images/' . $user->path_card)}}" alt="" width="400" height="400">@endif
                    {{-- <input type="file" class="form-control-file" id="path" name="path"> --}}
                  </div>

                  <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name"  @if(empty($user->id)) placeholder="name"@else value="{{$user->name}}" @endif required>                  
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" @if(empty($user->id)) placeholder="Email "@else value="{{$user->email}}" @endif required>
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Password ">
                  </div>

                  <div class="form-group">
                    <label for="cpassword">Password Ag</label>
                    <input type="hidden" class="form-control" id="oldpassword" name="oldpassword" value="@if(empty($user->id))@else{{$user->password}}@endif">
                    <input type="password" class="form-control" id="cpassword"  name="cpassword" placeholder="  Password Ag">
                  </div>

                  <div class="form-group">
                    <label for="phone">phone </label>
                    <input type="number" class="form-control" id="phone" name="phone" @if(empty($user->id)) placeholder="phone"@else value="{{$user->phone}}" @endif>
                  </div>
          
                  <div class="form-group">
                    <label for="address">address </label>
                    <input type="text" class="form-control" id="address" name="address" @if(empty($user->id)) placeholder="address"@else value="{{$user->address}}" @endif>
                  </div>
                  @if(empty($user->id))
                  <div class="form-group">
                    <label for="status">
                      <input type="checkbox" name="status" checked> On 
                    </label>
                  </div> 
                  @else
                  <div class="form-group">
                    <label for="status">
                      <input type="checkbox" name="status" @if ($user->status) checked @else @endif> Off 
                    </label>
                  </div>
                  @endif
                  @if (auth()->user()->role == 1)
                  <div class="form-group">
                    <label for="role">Rol </label>
                    <select class="form-control" id="role" name="role">
                        @if(empty($user->id))
                                <option value="1" selected='selected'>Admin</option>
                                <option value="2">Worker</option>
                                <option value="3">user</option>
                        @else
                            @if ($user->role == 1)
                                <option value="1" selected='selected'>Admin</option>
                                <option value="2">Worker</option>
                                <option value="3">user</option>
                            @elseif ($user->role == 2)
                                <option value="2" selected='selected'>Worker</option>
                                <option value="1">Admin</option>
                                <option value="3">user</option>
                            @else
                              <option value="3" selected='selected'>user</option>
                              <option value="1">Admin</option>
                              <option value="2">Worker</option>
                            @endif 
                        @endif
                    </select>
                  </div>
                  @else
                      @if(empty($user->id))
                          <input type="hidden" class="form-control" id="role" name="role" value="3">
                      @else
                          <input type="hidden" class="form-control" id="role" name="role" value="{{$user->role}}">
                      @endif

                  @endif
                </div>
                <!-- /.card-body -->

                {{-- rooooooooole end --}}
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