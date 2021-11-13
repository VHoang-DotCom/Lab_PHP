<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('home')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-basket"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="{{route('category.index')}}">
                        <i class="bi bi-circle"></i><span>Categories Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('category.index')}}">
                        <i class="bi bi-circle"></i><span>Accessories for people</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('category.index')}}">
                        <i class="bi bi-circle"></i><span>Items for motors</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('category.index')}}">
                        <i class="bi bi-circle"></i><span>More services</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#blogs-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-pencil-square"></i>
                <span>Blogs </span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="blogs-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('news.create')}}">
                        <i class="bi bi-circle"></i><span>Design Blog</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('news.index')}}">
                        <i class="bi bi-circle"></i><span>List Blogs</span>
                    </a>
                </li>
            </ul>
        </li><!-- End News Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('profile.index')}}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('login.faq')}}">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-whatsapp"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('login.login')}}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->



        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#error-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-exclamation-circle"></i>
                <span>Errors </span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="error-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="pages-error-404.html">
                        <i class="bi bi-circle"></i><span>Error 404</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('error.500')}}">
                        <i class="bi bi-circle"></i><span>Error 500</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Errors Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>



</aside><!-- End Sidebar-->
