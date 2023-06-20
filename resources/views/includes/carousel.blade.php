@php $lang = app()->getLocale('lang'); @endphp

                <!-- carousel -->
                <header id="imgcar1" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    @php $oi = 0; $active = "active"; @endphp
                    @foreach ($nodes1 as $node)
                        <li data-target="#imgcar1" data-slide-to="{{$oi++}}" class="{{$active}}" ></li>
                        @php $active = ""; @endphp
                    @endforeach
                  </ol>
                  <div class="carousel-inner color_carousel">

                    @php $active = "active"; @endphp
                    @foreach ($nodes1 as $node)
                    <div class="carousel-item {{$active}}">
                      <img src="{{asset('storage/coverImages/' . $node->path_img) }}" class="d-block img_carousel" alt="...">
                      <div class="carousel_top">
                        <a href="{{ '/news/' . $node->id }}" style="color: white"><h3>{{ str_limit($node->title, $limit = 100, $end = ' ..') }}</h3></a>
                        {{-- <p class="mt-4">{{$node->summary}}</p> --}}
                        <div class="mt-5 d-none d-md-block d-lg-block"><a href="{{ '/news/' . $node->id }}"><button type="button" class="btn btn-primary">{{trans('lang.carousel01')}}</button></a></div>
                      </div>
                    </div>
                    @php $active = ""; @endphp
                    @endforeach
                    
                  </div>
                </header>
                <!-- carousel end -->
                
