@extends('layouts.app')

@section('content')

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

<form action="{{ '/dsadmin/mainsetting/' . $mainsetting->id}}" method="POST">
    @csrf
    @method('PUT')

    <div class="card-body">

    <div class="form-group">
        <label for="name">Name Web</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$mainsetting->name}}" required>
    </div>

    <div class="form-group">
        <label for="phone">phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{$mainsetting->phone}}" required>
    </div>

    <div class="form-group">
        <label for="phone2">phone 2</label>
        <input type="text" class="form-control" id="phone2" name="phone2" value="{{$mainsetting->phone2}}">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{$mainsetting->email}}" required>
    </div>
    
    <div class="form-group">
        <label for="description">Description </label>
        <input type="text" class="form-control" id="description" name="description" value="{{$mainsetting->description}}" required>
    </div>

    <div class="form-group">
        <label for="keywords"> Keywords </label>
        <input type="text" class="form-control" id="keywords" name="keywords" value="{{$mainsetting->keywords}}" required>
    </div>

    <div class="form-group">
        <label for="address"> address </label>
        <input type="text" class="form-control" id="address" name="address" value="{{$mainsetting->address}}" required>
    </div>
    <div class="form-group">
        <label for="address2">address 2 </label>
        <input type="text" class="form-control" id="address2" name="address2" value="{{$mainsetting->address2}}">
    </div>

</div>
<!-- /.card-body -->

    <button class="btn btn-primary" type="submit">Save</button>
  </form>

  

</div>
<!-- /.card -->
</div>
</div>
</div>
</section>

@endsection