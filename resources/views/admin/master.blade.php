<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> قالب مدیریتی </title>
    <link rel="shortcut icon" href="{{ url('panel/assets/media/image/favicon.png') }}">
    <meta name="theme-color" content="#5867dd">
    <link rel="stylesheet" href="{{ url('panel/vendors/bundle.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('panel/vendors/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ url('panel/vendors/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ url('panel/vendors/vmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ url('panel/assets/css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/themify-icons@1.0.1/css/themify-icons.css" rel="stylesheet">
    @vite('resources/css/app.css')

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f4ff',
                            100: '#e0e9ff',
                            200: '#c7d7fe',
                            300: '#a5b8fc',
                            400: '#8192f8',
                            500: '#5867dd',
                            600: '#4851c4',
                            700: '#3a3f9d',
                            800: '#2f337d',
                            900: '#262a63',
                        },
                        dark: {
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                    fontFamily: {
                        sans: ['Vazirmatn', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap');

        body {
            font-family: 'Vazirmatn', sans-serif;
        }

        .sidebar-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .submenu-enter-active,
        .submenu-leave-active {
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .submenu-enter-from,
        .submenu-leave-to {
            max-height: 0;
            opacity: 0;
        }

        .submenu-enter-to,
        .submenu-leave-from {
            max-height: 500px;
            opacity: 1;
        }

        #mobileOverlay {
            backdrop-filter: blur(5px);
            background-color: rgba(255, 255, 255, 0.7) !important;
            transition: all 0.3s ease;
        }

        .dark #mobileOverlay {
            background-color: rgba(0, 0, 0, 0.7) !important;
        }
    </style>
    @vite('resources/css/app.css')

    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-800 dark:bg-dark-900 dark:text-gray-200">
@include('admin.layout.header')

<div class="flex h-screen overflow-hidden">

    <!-- Mobile Overlay -->
    <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar"
           class="fixed lg:relative w-72 h-full bg-white dark:bg-dark-800 shadow-xl z-50 sidebar-transition -right-72 lg:right-0">

            <button id="closeSidebar" class="lg:hidden cursor-pointer text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                <i class="ri-close-line text-xl"></i>
            </button>

        <!-- User Profile -->
        <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex items-center space-x-3 space-x-reverse">
            <div class="relative">
                <img src="https://img.icons8.com/?size=100&id=13042&format=png&color=000000" alt="User"
                     class="w-12 h-12 rounded-full border-2 border-primary-500">
                <span
                    class="absolute bottom-0 left-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white dark:border-dark-800"></span>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800 dark:text-white">محمد رضایی</h4>
                <span class="text-xs text-gray-500 dark:text-gray-400">مدیر سیستم</span>
            </div>
        </div>

        <!-- Main Menu -->
        <div class="overflow-y-auto h-[calc(100%-180px)]">
            <ul class="p-2 space-y-1">
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('panel') }}"
                       class="flex items-center p-3 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-dark-700 group">
                        <i class="ri-dashboard-line text-xl text-gray-500 dark:text-gray-400 group-hover:text-primary-500"></i>
                        <span class="mr-3">داشبورد</span>
                    </a>
                </li>

                <!-- Users Menu -->
                <li>
                    <button type="button"
                            class="flex items-center text-gray-700 justify-between w-full p-3 rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-dark-700 group"
                            aria-controls="users-submenu" data-collapse-toggle="users-submenu">
                        <div class="flex items-center">
                            <i class="ri-user-line text-xl dark:text-gray-400 group-hover:text-primary-500"></i>
                            <span class="mr-3 text-gray-400">مدیریت کاربران</span>
                        </div>
                        <i class="ri-arrow-down-s-line text-gray-500 transition-transform group-hover:text-primary-500"></i>
                    </button>
                    <ul id="users-submenu" class="py-2 space-y-1">
                        <li class="hover:bg-gray-50">
                            <a href="{{route('user-creat')}}"
                               class="flex items-center p-3 pr-11 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-dark-700 group">
                                <i class="ri-user-add-line text-lg text-gray-500 dark:text-gray-400 group-hover:text-primary-500"></i>
                                <span class="mr-3">ایجاد کاربر جدید</span>
                            </a>
                        </li>
                        <li class="hover:bg-gray-50">
                            <a href="{{route('user-list')}}"
                               class="flex items-center p-3 pr-11 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-dark-700 group">
                                <i class="ri-list-check text-lg text-gray-500 dark:text-gray-400 group-hover:text-primary-500"></i>
                                <span class="mr-3">لیست کاربران</span>
                                <span
                                    class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-medium bg-primary-500 text-white rounded-full">24</span>
                            </a>
                        </li>
                        <li class="hover:bg-gray-50">
                            <a href="#"
                               class="flex items-center p-3 pr-11 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-dark-700 group">
                                <i class="ri-shield-user-line text-lg text-gray-500 dark:text-gray-400 group-hover:text-primary-500"></i>
                                <span class="mr-3">نقش‌های کاربری</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Products Menu -->
                <li>
                    <button type="button"
                            class="flex items-center justify-between w-full p-3 rounded-lg text-gray-700 dark:text-gray-600 hover:bg-gray-100 dark:hover:bg-dark-700 group"
                            aria-controls="products-submenu" data-collapse-toggle="products-submenu">
                        <div class="flex items-center">
                            <i class="ri-shopping-bag-line text-xl text-gray-500 dark:text-gray-400 group-hover:text-primary-500"></i>
                            <span class="mr-3 text-gray-400">مدیریت محصولات</span>
                        </div>
                        <i class="ri-arrow-down-s-line text-gray-500 transition-transform group-hover:text-primary-500"></i>
                    </button>
                    <ul id="products-submenu" class="hidden py-2 space-y-1">
                        <li class="hover:bg-gray-50">
                            <a href="#"
                               class="flex items-center p-3 pr-11 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-dark-700 group">
                                <i class="ri-add-circle-line text-lg text-gray-500 dark:text-gray-400 group-hover:text-primary-500"></i>
                                <span class="mr-3">محصول جدید</span>
                            </a>
                        </li>
                        <li class="hover:bg-gray-50">
                            <a href="#"
                               class="flex items-center p-3 pr-11 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-dark-700 group">
                                <i class="ri-list-unordered text-lg text-gray-500 dark:text-gray-400 group-hover:text-primary-500"></i>
                                <span class="mr-3">لیست محصولات</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Reports -->
                <li class="hover:bg-gray-50">
                    <a href="#"
                       class="flex items-center p-3 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-dark-700 group">
                        <i class="ri-bar-chart-line text-xl text-gray-500 dark:text-gray-400 group-hover:text-primary-500"></i>
                        <span class="mr-3">گزارشات</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Bottom Menu -->
        <div
            class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-dark-800">
            <ul class="space-y-1">
                <li class="hover:bg-gray-50">
                    <a href="#"
                       class="flex items-center p-3 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-dark-700 group">
                        <i class="ri-settings-3-line text-xl text-gray-500 dark:text-gray-400 group-hover:text-primary-500"></i>
                        <span class="mr-3">تنظیمات</span>
                    </a>
                </li>
                <li class="hover:bg-gray-50">
                    <a href="login.html"
                       class="flex items-center p-3 rounded-lg text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 group">
                        <i class="ri-logout-box-r-line text-xl text-red-500 group-hover:text-red-600"></i>
                        <span class="mr-3">خروج</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-auto">
        <!-- Mobile Header -->
        <header class="lg:hidden flex items-center justify-between p-4 bg-white dark:bg-dark-800 shadow-sm z-30">
            <button id="openSidebar" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                <i class="ri-menu-line text-xl"></i>
            </button>
            <div class="text-lg font-semibold">پنل مدیریت</div>
            <div class="w-6"></div> <!-- For balance -->
        </header>

        <!-- Content -->
        <div class="p-4">
            <h1 class="text-2xl font-bold mb-6">داشبورد مدیریت</h1>
            <br/>
            {{$slot}}
        </div>
    </main>
</div>

<script src="{{ url('panel/vendors/bundle.js') }}"></script>
<script src="{{ url('panel/vendors/slick/slick.min.js') }}"></script>
<script src="{{ url('panel/vendors/vmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('panel/assets/js/app.js') }}"></script>

<script>
    // Sidebar toggle functionality
    const sidebar = document.getElementById('sidebar');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const openSidebarBtn = document.getElementById('openSidebar');
    const closeSidebarBtn = document.getElementById('closeSidebar');

    openSidebarBtn.addEventListener('click', () => {
        sidebar.classList.remove('-right-72');
        sidebar.classList.add('right-0');
        mobileOverlay.classList.remove('hidden');
    });

    closeSidebarBtn.addEventListener('click', () => {
        sidebar.classList.remove('right-0');
        sidebar.classList.add('-right-72');
        mobileOverlay.classList.add('hidden');
    });

    mobileOverlay.addEventListener('click', () => {
        sidebar.classList.remove('right-0');
        sidebar.classList.add('-right-72');
        mobileOverlay.classList.add('hidden');
    });

    // Collapsible menu functionality
    document.querySelectorAll('[data-collapse-toggle]').forEach(button => {
        button.addEventListener('click', () => {
            const targetId = button.getAttribute('aria-controls');
            const target = document.getElementById(targetId);
            const icon = button.querySelector('i:last-child');

            target.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });

    // Dark mode toggle (example)
    const darkModeToggle = document.createElement('button');
    darkModeToggle.innerHTML = '<i class="ri-moon-line"></i>';
    darkModeToggle.className = 'fixed bottom-4 left-4 w-12 h-12 rounded-full bg-primary-500 text-white shadow-lg flex items-center justify-center text-xl z-50';
    darkModeToggle.addEventListener('click', () => {
        document.documentElement.classList.toggle('dark');
        darkModeToggle.innerHTML = document.documentElement.classList.contains('dark')
            ? '<i class="ri-sun-line"></i>'
            : '<i class="ri-moon-line"></i>';
    });
    document.body.appendChild(darkModeToggle);
</script>
@livewireScripts
</body>
</html>
