            <!-- القائمة الجانبية -->
            <aside class="col-lg-3 d-none d-lg-block">
                <section>
                    <div class="lineBut">
                        <i class="fa fa-caret-left">اخر الاخبار</i>
                    </div>
                    <div class="list-group list-group-flush">
                        @foreach ($nodeAll as $node)
                            <a class="list-group-item text-dark" href="{{ '/news/' . $node->id }}">
                                {{ str_limit($node->title, $limit = 50, $end = ' ..') }}
                            </a>
                        @endforeach
                    </div>
                    <hr class="d-block d-lg-none">
                </section>

                <section>
                    <div class="lineBut mt-5">
                        <i class="fa fa-caret-left">اعلانات</i>
                    </div>
                    <div id="carouselExampleControls" class="carousel slide mt-2" data-ride="carousel">
                        <div class="carousel-inner">

                          @php $active='active';  @endphp
                            @foreach ($importanturls1all as $importanturls)
                              <div class="carousel-item {{ $active }}">
                                <a href="{{$importanturls->url}}">
                                    <img src="{{asset('storage/thumbnails/' . $importanturls->path_img) }}" class="d-block imgnew" alt="...">
                                </a> 
                              </div>
                          @php $active='';  @endphp
                            @endforeach
                            
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                </section>

                <section>
                    <div class="lineBut mt-5 mb-3">
                        <i class="fa fa-caret-left">راسلنا</i>
                    </div>
                        <form action="/cpanel/msg" method="POST" class="text-left">       
                            @csrf
                            <main>
                                @include('includes.messages')
                            </main>
                            <div class="form-group">
                                <input type="text" class="form-control"  name="name" id="name" placeholder="الاسم" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="البريد" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="body" id="body" rows="6" placeholder="الموضوع"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">إرسال</button>
                        </form>
                </section>
            </aside>
            <!-- القائمة الجانبية end-->