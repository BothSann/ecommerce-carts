    <!--============================
        MENU START
    =============================-->
    <nav class="navbar navbar-expand-lg main_menu">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="Freeit" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="far fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="m-auto navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogs.html">Blog</a>
                    </li>
                </ul>
                <ul class="flex-wrap right_menu d-flex align-items-center">
                    <li>
                        <a href="#" class="wsus__manu_cart icon">
                            <span>
                                <img src="images/cart_icon_black.svg" alt="Cart" class="img-fluid">
                                <b>2</b>
                            </span>
                        </a>
                    </li>
                    <li>
                        @auth
                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                @csrf
                                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Profile</a>
                                <button type="submit" class="btn btn-primary">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="common_btn">Login</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--============================
      MENU END
  =============================-->
