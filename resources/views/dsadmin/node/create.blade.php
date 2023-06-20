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
              <li class="breadcrumb-item"><a href="/dsadmin">الرئيسية </a></li>
              <li class="breadcrumb-item active"><a href="{{$urls}}">إدارة النشر </a></li>
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
                
                @unless (empty($node->id))
                    @method('PUT')
                @endunless

                <div class="card-body">

                  <div class="form-group">
                    <label for="title">العنوان</label>
                    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title"  @if(empty($node->id)) placeholder="العنوان"@else value="{{$node->title}}" @endif required>                  
                  </div>

                  <div class="form-group">
                    <label for="body">التفاصيل </label>
                    <textarea id="editor" class="form-control editor" name="body" rows="3">@if(empty($node->id)) @else {{$node->body}} @endif</textarea>
                    <script> CKEDITOR.replace( 'editor' ); </script>
                  </div>
                  
                  <div class="form-group">
                    <label for="summary">ملخص الموضوع</label>
                    <input type="text" class="form-control {{ $errors->has('summary') ? ' is-invalid' : '' }}" id="summary" name="summary"  @if(empty($node->id)) placeholder="الملخص"@else value="{{$node->summary}}" @endif >                  
                  </div>

                  <div class="form-group">
                    <label for="publish_date">تاريخ النشر</label>
                    <input type="date" class="form-control{{ $errors->has('publish_date') ? ' is-invalid' : '' }}" id="publish_date" name="publish_date"  @if(empty($node->id)) placeholder="تاريخ النشر"@else value="{{$node->publish_date}}" @endif required>                  
                  </div>

                  <div class="form-group">
                    <label for="name">رابط اليوتيوب</label> <i class="fab fa-youtube-square" style="color: red"></i>
                    <input type="text" class="form-control{{ $errors->has('urlyoutube') ? ' is-invalid' : '' }}" id="urlyoutube" name="urlyoutube"  @if(empty($node->id)) placeholder="url"@else value="{{$node->urlyoutube}}" @endif >                  
                  </div>

                  <div class="form-group">
                    <label for="img_path">الصوره الرئيسية (اصغر من 5 ميجا)</label>
                    <input type="hidden" class="form-control" id="oldpath" name="oldpath" value="@if(empty($node->id))@else{{$node->img_path}}@endif">
                    @if(empty($node->id))@else <img src="{{asset('storage/images/' . $node->img_path)}}" alt="" width="40" height="40">@endif
                    <input type="file" class="form-control-file" id="img_path" name="img_path">
                  </div>

          
                  <div class="form-group">
                    <label for="orders">الترتيب </label>
                    <input type="number" class="form-control" id="orders" name="orders" @if(empty($node->id)) value="0"@else value="{{$node->orders}}" @endif>
                  </div>

                  <div class="form-group">
                    <label for="keywords">الكلمات المفتاحية (لاتحتوي مسافات)</label>
                    <input type="text" class="form-control{{ $errors->has('keywords') ? ' is-invalid' : '' }}" id="keywords" name="keywords"  @if(empty($node->id)) placeholder="العنوان-بدون-مسافات"@else value="{{$node->keywords}}" @endif required>                  
                  </div>

                  <div class="form-group">
                    <label for="node_type_id">القسم</label>
                    @if(empty($node->id))
                        <select class="form-control" id="node_type_id" name="node_type_id">
                            @foreach ($node_types as $node_type)
                                <option value="{{$node_type->id}}">{{$node_type->name}}</option>
                          @endforeach
                        </select>
                    @else
                        <select class="form-control" id="node_type_id" name="node_type_id">
                          <option value="{{$node->node_type_id}}">{{$node->node_type->name}}</option>

                          @foreach ($node_types as $node_type)
                              @if ($node_type->id != $node->node_type_id)
                                <option value="{{$node_type->id}}">{{$node_type->name}}</option>
                              @endif
                          @endforeach

                        </select>
                    @endif
                  </div>

                  <div class="form-group">
                  @if(empty($node->id))
                    <label for="top">
                      <input type="checkbox" name="top" > مثبت 
                    </label>
                  @else
                    <label for="top">
                      <input type="checkbox" name="top" @if ($node->top) checked @else @endif> مثبت 
                    </label>
                  @endif

                  @if(empty($node->id))
                    <label for="status">
                      <input type="checkbox" name="status" checked> نشر 
                    </label>
                  @else
                    <label for="status">
                      <input type="checkbox" name="status" @if ($node->status) checked @else @endif> نشر 
                    </label>
                  @endif
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
              </form>

            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

    {{-- content end --}}
{{-- Image --}}
@if(empty($node->id))
@else
<div class="container">    
  <div class='jumbotron'>
      <div  style='padding:15px;'>
            {{-- @if ($node->node_type_id == 2 || $node->node_type_id == 4 || $node->node_type_id == 5) --}}
            <div class="form-group">
                <label for="path">الصوره</label>
                <div class="row">
                    @if ($node->file()->count() > 0) 
                    @foreach ($node->file as $file) 
                        <div class="card col-3">
                          {{-- //عرض الصور مع التكبير --}}

                            <a href="#" data-lity data-lity-target="{{ asset('storage/images') . '/' . $file->path}}">
                              <img src="{{ asset('storage/thumbnails') . '/' . $file->path}}" height="150px" width="150px" class="card-img-top mb-3">
                              </a>
                              
                          <div class="card-footer">
                            {{-- //فورم الحذف --}}
                          <form action="{{route('file.destroy', ['file' => $file])}}" method="POST">
                              @csrf
                              @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                          </form>
                          </div>
                        </div>
                    @endforeach
                @else
                <p> No Image</p>
                @endif
                </div>
                  <div class="col-12">
                      {{-- //فورم إضافة الملفات --}}
                      <form method="POST" action="{{ route('node.upload', [ 'node' => $node ])}}" class="dropzone" id="myDropzoneForm">
                      @csrf
                      </form>
                  </div>
                 </div>
              {{-- @endif --}}
</div></div></div>
@endif
{{-- End imag --}}
@endsection

@section('scripts')
{{-- //مكتبة رفع الصور --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Dropzone.options.myDropzoneForm = {
            //paramName: "file", // The name that will be used to transfer the file
            //maxFilesize: 2, // MB
            acceptedFiles: 'image/*', //type image
            init: function() {
                this.on('success', function() {
                    if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length ==
                        0) {
                        console.log("finished")
                        location.reload() //rfresh image
                    }
                })
            }
        }
    });
</script>
@endsection