<div>
    <style>
        :root {
            --primary-color: #4361ee;
            --danger-color: #e7515a;
            --warning-color: #e2a03f;
            --info-color: #2196f3;
            --secondary-color: #805dca;
        }

        body {
            font-family: Vazir, sans-serif;
            background-color: #f1f2f3;
        }

        .header {
            background-color: white;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            margin-top: -100px;
            z-index: 1020;
        }

        .header-body {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1.5rem;
        }

        .page-title {
            font-weight: 600;
            color: #3b3f5c;
            margin-bottom: 0.5rem;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 0;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: ">";
            padding: 0 0.5rem;
        }

        .navbar-nav {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .nav-link {
            color: #3b3f5c;
            padding: 0.5rem 1rem;
            font-size: 1.25rem;
            position: relative;
        }

        .nav-link-notify::after {
            content: "";
            position: absolute;
            top: 5px;
            right: 5px;
            width: 8px;
            height: 8px;
            background-color: var(--danger-color);
            border-radius: 50%;
        }

        .dropdown-menu-big {
            width: 320px;
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .bg-hover:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .bg-primary-bright {
            background-color: rgba(67, 97, 238, 0.1);
        }

        .bg-danger-bright {
            background-color: rgba(231, 81, 90, 0.1);
        }

        .bg-warning-bright {
            background-color: rgba(226, 160, 63, 0.1);
        }

        .bg-info-bright {
            background-color: rgba(33, 150, 243, 0.1);
        }

        .bg-secondary-bright {
            background-color: rgba(128, 93, 202, 0.1);
        }

        .border-radius-1 {
            border-radius: 0.5rem;
        }

        .navigation-toggler, .navbar-toggler {
            color: #3b3f5c;
            font-size: 1.25rem;
            padding: 0.5rem;
            margin-right: 0.5rem;
        }

        @media (max-width: 768px) {
            .header-body {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-body-right {
                margin-top: 1rem;
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
    </head>
    <div>
        <!-- هدر داشبورد -->
        <header class="header">
            <div class="header-body">
                <!-- بخش سمت راست (عنوان و ناوبری) -->
                <div class="header-body-left">
                    <h3 class="page-title">@yield('title', 'داشبورد')</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                            @if(isset($breadcrumbs))
                                @foreach($breadcrumbs as $breadcrumb)
                                    <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                                        @if(!$loop->last && isset($breadcrumb['url']))
                                            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a>
                                        @else
                                            {{ $breadcrumb['title'] }}
                                        @endif
                                    </li>
                                @endforeach
                            @else
                                <li class="breadcrumb-item active" aria-current="page">لیست</li>
                            @endif
                        </ol>
                    </nav>
                </div>

                <!-- بخش سمت چپ (آیکون‌ها و منوها) -->
                <div class="header-body-right">
                    <ul class="navbar-nav">
                        <!-- منوی دسترسی سریع -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                <i class="ti-plus"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-big">
                                <div class="p-3">
                                    <h6 class="font-size-13 m-b-15">دسترسی سریع</h6>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="#">
                                                <div
                                                    class="d-flex flex-column font-size-13 bg-danger-bright bg-hover pt-3 pb-3 border-radius-1 text-danger text-center mb-3">
                                                    <i class="fa fa-sitemap mb-2 font-size-20"></i>
                                                    دسته‌بندی‌ها
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#">
                                                <div
                                                    class="d-flex flex-column font-size-13 bg-info-bright bg-hover pt-3 pb-3 border-radius-1 text-info text-center mb-3">
                                                    <i class="ti-game mb-2 font-size-20"></i>
                                                    محصولات
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#">
                                                <div
                                                    class="d-flex flex-column font-size-13 bg-warning-bright bg-hover pt-3 pb-3 border-radius-1 text-warning text-center">
                                                    <i class="ti-bar-chart-alt mb-2 font-size-20"></i>
                                                    گزارشات
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#">
                                                <div
                                                    class="d-flex flex-column font-size-13 bg-secondary-bright bg-hover pt-3 pb-3 border-radius-1 text-secondary text-center">
                                                    <i class="fa fa-share mb-2 font-size-20"></i>
                                                    سایر
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- نوتیفیکیشن‌ها -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link nav-link-notify" data-bs-toggle="dropdown">
                                <i class="ti-comment"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-big">
                                <div class="p-4 text-center"
                                     style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('{{ asset('assets/media/image/profile-bg.png') }}'); background-size: cover; color: white;">
                                    <h6 class="m-b-0">پیام‌ها</h6>
                                    <small class="font-size-13 opacity-7 d-inline-block m-t-5">
                                        {{ $unreadMessagesCount ?? 0 }} پیام خوانده نشده
                                    </small>
                                </div>
                                <div>
                                    <ul class="list-group list-group-flush">
                                        @forelse($recentMessages ?? [] as $message)
                                            <li>
                                                <a href="#"
                                                   class="p-3 list-group-item d-flex align-items-center link-1 hide-show-toggler">
                                                    <div>
                                                        <figure class="avatar avatar-sm m-r-15">
                                                            <span
                                                                class="avatar-title bg-success rounded-circle">{{ mb_substr($message->sender->name, 0, 1) }}</span>
                                                        </figure>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 d-flex justify-content-between primary-font">
                                                            {{ $message->sender->name }}
                                                            @if($message->unread)
                                                                <i title="علامت خوانده نشده" data-bs-toggle="tooltip"
                                                                   class="hide-show-toggler-item fa fa-check font-size-13"></i>
                                                            @endif
                                                        </h6>
                                                        <span
                                                            class="text-muted m-r-10 small">{{ jdate($message->created_at)->format('H:i') }}</span>
                                                        <span
                                                            class="text-muted small line-height-24">{{ Str::limit($message->body, 30) }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @empty
                                            <li class="p-3 text-center text-muted">
                                                پیامی وجود ندارد
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <!-- پروفایل کاربر -->
                        <li class="nav-item dropdown ms-2">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                <figure class="avatar avatar-sm">
                                    <img src="https://img.icons8.com/?size=100&id=13042&format=png&color=000000"
                                         class="rounded-circle" alt="پروفایل کاربر">
                                </figure>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <i class="ti-user me-2"></i> پروفایل
                                </a>
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <i class="ti-settings me-2"></i> تنظیمات
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="#">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                                        <i class="ti-power-off me-2"></i> خروج
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>

                    <!-- دکمه‌های نمایش منو در موبایل -->
                    <div class="d-flex mt-[-100px] align-items-center">

                        <div class="d-xl-none d-lg-none d-sm-block navbar-toggler">
                            <a href="#" id="navbarToggle">
                                <img class="border rounded-full bg-gray-200 mt-6 mr-6" src="https://img.icons8.com/?size=100&id=13042&format=png&color=000000">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- اسکریپت‌ها -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // فعال کردن tooltip‌ها
            document.addEventListener('DOMContentLoaded', function () {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });

                // مدیریت رویداد کلیک برای منوهای موبایل
                document.getElementById('sidebarToggle').addEventListener('click', function (e) {
                    e.preventDefault();
                    document.body.classList.toggle('sidebar-collapsed');
                });

                document.getElementById('navbarToggle').addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector('.header-body-right .navbar-nav').classList.toggle('show');
                });
            });
        </script>
    </div>
</div>
