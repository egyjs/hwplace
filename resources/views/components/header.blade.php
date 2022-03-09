@php
    $sections = \App\Models\Section::get();
@endphp
<!--start navbar-->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="https://i.imgur.com/9KNZKJU.png" alt="Logo"/></a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-primary rounded-pill" href="/">
                        الرئيسية
                    </a>
                </li>
                @if($sections->count())
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link btn btn-primary rounded-pill dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-expanded="false">
                            الاقسام
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach(\App\Models\Section::whereHas('ad')->get() as $section)
                                <a class="dropdown-item"
                                   href="{{ route('search',$section->id) }}">{{ $section->name }}</a>
                            @endforeach
                        </div>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link btn btn-primary rounded-pill" href="#">تواصل</a>
                </li>
            </ul>
            <div class="my-2 my-lg-0 nav-social">
                <a href="{{ "https://hwplace-com.translate.goog/?_x_tr_sl=en&_x_tr_tl=ar&_x_tr_hl=ar&_x_tr_pto=wapp" }}">
                    <span>
                        <i class="fa fa-language"></i>
                    </span>
                </a>
                <a href="#">
                    <span>
                        <i class="fab fa-instagram"></i>
                    </span>
                </a>
                <a href="#">
                    <span>
                        <i class="fab fa-facebook-f"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>
<!--end navbar-->
