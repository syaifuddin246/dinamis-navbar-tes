<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="{{url('/')}}"><span>Kejari Tes</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          @foreach ($menuitem as $item)
          {{-- kondisi jika --}}
              @if (count($item->submenuitem)>0)
                <li class="dropdown"><a href="#"><span>{{$item->nama}}</span> <i class="bi bi-chevron-down"></i></a>
                    @foreach ($item->submenuitem as $row)
                      @if (count($item->submenuitem1)>0)
                        <ul>
                          <li class="dropdown"><a href="#"><span>{{$item->nama}}</span> <i class="bi bi-chevron-down"></i></a>
                            @foreach ($item->submenuitem1 as $row)
                                <ul>                            
                                  <li><a href="{{$row->link}}">{{$row->nama}}</a></li>
                                </ul>
                            @endforeach
                        </ul>
                      @else
                      <ul>                            
                        <li><a href="{{$item->link}}">{{$item->nama}}</a></li>
                      </ul>
                      @endif                
                    @endforeach
                </li>
              @else
                <li class="dropdown"><a href="{{$item->link}}">{{$item->nama}}</a></li>
               @endif
          @endforeach
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->