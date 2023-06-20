@extends('layouts.app')

@section('content')

      <div class="card mb-3">
          <div class="card-header">
              <i class="fas fa-table"></i>
               Show Msg</div>
          <div class="card-body">
              <div class="table-responsive">
                      <p>{{ $msg->name }}</p>
                      <hr>
                      <h5>{{ $msg->title }}</h5>
                      <hr>
                      <p>{!! $msg->body !!}</p>
                      <hr>
                      <p class="mt-3">{{ $msg->email }}</p>
                      <p class="mt-3">{{ $msg->created_at }}</p>
  
                      
              </div>
          </div>
      </div>


@endsection