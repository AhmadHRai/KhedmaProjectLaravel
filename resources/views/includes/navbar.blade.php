@php $lang = app()->getLocale('lang'); @endphp
                <!-- header -->
    <!-- navbar -->
    
              <!-- navbar -->
                <nav class="navbar navbar-expand-lg navbar-light nav_top fixed-top">
                  <div class="container">
                    <a class="navbar-brand" href="#">
                      <img class="img_logo top" src="/images/logo.png">
                      <img class="img_logo scroll d-none" src="/images/logo_w.png">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                          <li class="nav-item active">
                              <a class="nav-link" href="/"><i class="fas fa-home"></i><span>الرئيسية</span></a>
                          </li>
              
                          <li class="nav-item dropdown">
                              <a class="nav-link" href="#" id="menu-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>عن النقابة</span><i class="fas fa-angle-down px-1"></i>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="menu-1">
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/about/2"><span>نبذة عن النقابة</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/section/4"><span>مجلس النقابة</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/multimedia/3"><span>الشهادات والأوسمة</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/multimedia/4"><span>شهادات الإعتراف</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/about/3"><span> آلة عمل النقابة</span></a>
                                  </li>
                              </ul>
                          </li>
              
                          <li class="nav-item dropdown">
                              <a class="nav-link" href="#" id="menu-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>الدوائر والأقسام</span><i class="fas fa-angle-down px-1"></i>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="menu-2">
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/about/4"><span>دوائر النقابة</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/about/5"><span>أقسام النقابة</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/about/12"><span>أعضاء فريق النقابة</span></a>
                                  </li>
                              </ul>
                          </li>
              
                          <li class="nav-item dropdown">
                              <a class="nav-link" href="#" id="menu-3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>النقابة</span><i class="fas fa-angle-down px-1"></i>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="menu-3">
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/about/6"><span>أهداف النقابة</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/about/7"><span>سياسة النقابة</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/about/8"><span>الأنظمة والقوانين</span></a>
                                  </li>
                              </ul>
                          </li>
              
                          <li class="nav-item dropdown">
                              <a class="nav-link" href="#" id="menu-4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>المكتبة</span><i class="fas fa-angle-down px-1"></i>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="menu-4">
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/section/5"><span>مجلة النقابة</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/section/6"><span>الابحاث والدراسات</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/section/7"><span>المكتبة الإلكترونية</span></a>
                                  </li>
                              </ul>
                          </li>
              
                          <li class="nav-item dropdown">
                              <a class="nav-link" href="#" id="menu-5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>الدائرة الإعلامية</span><i class="fas fa-angle-down px-1"></i>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="menu-5">
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/news"><span>أخبار النقابة</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/section/1"><span>الأنشطة والفعاليات</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/section/2"><span>الأجتماعات واللقائات</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/section/3"><span>قرارات النقابة</span></a>
                                  </li>
                              </ul>
                          </li>
              
                          <li class="nav-item dropdown">
                              <a class="nav-link" href="#" id="menu-5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>الإنتساب</span><i class="fas fa-angle-down px-1"></i>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="menu-5">
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/about/9"><span>شروط العضوية</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/about/10"><span>واجبات العضوية</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/about/11"><span>حقوق العضوية</span></a>
                                  </li>
                              </ul>
                          </li>
              
                          {{-- <li class="nav-item dropdown">
                              <a class="nav-link" href="#" id="menu-5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span>العضوية</span><i class="fas fa-angle-down px-1"></i>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="menu-5">
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="/news"><span>تسجيل الدخول</span></a>
                                  </li>
                                  <li class="nav-item dropdown-item">
                                      <a class="nav-link" href="#"><span>طلب انضمام</span></a>
                                  </li>
                              </ul>
                          </li> --}}
              
                          <li class="nav-item">
                              <a class="nav-link" href="/connects"><span>التواصل</span></a>
                          </li>
                      </ul>
                    </div>
                    <div class="btn-language">
                      @if ( app()->getLocale('lang') == 'en')
                      <div class="" aria-labelledby="dropdownMenuButton">
                          <a href="{{ str_replace("//en.","//", url()->current()) }}"  ><i class="fa fa-language"></i> العربية</a>
                      </div>
                      @else
                      <div class="" aria-labelledby="dropdownMenuButton">
                          <a href="{{ str_replace("//","//en.", url()->current()) }}"  ><i class="fa fa-language"></i> English</a>
                      </div>
                      @endif
                    </div>
                  </div>
      </nav>
<!--  -->
                <!-- header end -->

