<header class="navbar-light navbar-sticky header-static">
    <!-- Nav START -->
    <nav class="navbar navbar-expand-xl">
        <div class="container-fluid px-3 px-xl-5">
            <!-- Logo START -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="light-mode-item navbar-brand-item" src="{{ url('front/images/client/google.svg') }}"
                     alt="logo">
                <img class="dark-mode-item navbar-brand-item" src="{{ url('front/images/client/google.svg') }}"
                     alt="logo">
            </a>
            <!-- Logo END -->

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
            </button>

            <!-- Main navbar START -->
            <div class="collapse navbar-collapse w-100" id="navbarCollapse">
                <ul class="navbar-nav navbar-nav-scroll me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="{{ route('home') }}">صفحه اصلی</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('courses') }}">لیست دوره ها</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#">درباره ما</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#">تماس با ما</a>
                    </li>
                </ul>
            </div>
            <!-- Main navbar END -->
        </div>
    </nav>
    <!-- Nav END -->
</header>
