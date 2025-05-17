<div>
    <button class="bg-blue-600 text-white font-bold py-1 px-3 rounded-md my-2" wire:click="$refresh">بروزرسانی</button>
    <button class="bg-blue-600 text-white font-bold py-1 px-3 rounded-md my-2" wire:click="resetCreate">پاک کردن</button>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="container-fluid">
                @if (session()->has('message'))
                    <div class="alert alert-info">
                        {{ session('message') }}
                    </div>
                @endif
                <h5 class="card-title mb-4 text-primary">
                    <i class="fas fa-user-plus me-2"></i>
                    ایجاد کاربر جدید
                </h5>
                <form wire:submit="saveUser" class="needs-validation" novalidate>
                    <!-- ردیف اول - نام و ایمیل -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="name" class="form-label fw-semibold">نام و نام خانوادگی</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-user text-muted"></i>
                                </span>
                                <input type="text"
                                       class="form-control form-control-lg @error('name') is-invalid @enderror"
                                       id="name"
                                       wire:model='name'>
                            </div>
                            @error('name')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">ایمیل</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input type="email"
                                       class="form-control form-control-lg @error('email') is-invalid @enderror"
                                       id="email"
                                       wire:model="email">
                            </div>
                            @error('email')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- ردیف دوم - موبایل و پسورد -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="mobile" class="form-label fw-semibold">موبایل</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">+98</span>
                                <input type="tel"
                                       class="form-control form-control-lg @error('mobile') is-invalid @enderror"
                                       id="mobile"
                                       wire:model="mobile">
                            </div>
                            @error('mobile')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label fw-semibold">پسورد</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input type="password"
                                       class="form-control form-control-lg @error('password') is-invalid @enderror"
                                       id="password"
                                       wire:model="password">
                                <button class="btn btn-light" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- آپلود عکس -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="file" class="form-label fw-semibold">آپلود عکس پروفایل</label>
                            <div class="d-flex align-items-center">
                                {{--                                <div class="me-3">--}}
                                {{--                                    <img id="preview"--}}
                                {{--                                         src="https://img.icons8.com/?size=100&id=13042&format=png&color=000000"--}}
                                {{--                                         class="rounded-circle border w-24 h-24" width="80" height="80" alt="Preview">--}}
                                {{--                                </div>--}}
                                <div class="mr-3 avatar avatar-xl w-28 h-28 rounded-full bg-gray-300">
                                    <div class="spinner-grow spinner-border-sm text-danger text-center" wire:loading
                                         wire:target="image"></div>
                                    @if($image)
                                        <img class="rounded-circle w-28 h-28 shadow-sm"
                                             src="{{$image->temporaryUrl()}}">
                                    @endif
                                </div>
                                <div class="flex-grow-1">
                                    <input wire:model="image"
                                           type="file"
                                           class="form-control @error('image') is-invalid @enderror"
                                           id="file"
                                           accept="image/*">
                                    <div class="form-text">فرمت‌های مجاز: JPG, PNG (حداکثر 2MB)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- دکمه ارسال و دکمه ویرایش -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" wire:loading.attr="disablad" class="btn btn-primary btn-lg px-4 py-2">
                            <i class="fas fa-save me-2"></i>
                            <span wire:loading.remove> ذخیره کاربر</span>
                            <span wire:loading>در حال ارسال داده<span
                                    class="spinner-grow spinner-grow-sm"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <livewire:admin.panel.index lazy />
    <style>
        /* استایل‌های پایه */
        .form-control-lg {
            padding: 0.75rem 1rem;
            font-size: 1rem;
        }

        .card {
            border-radius: 12px;
        }

        .input-group-text {
            transition: all 0.3s;
        }

        .form-control:focus + .input-group-text {
            background-color: #e9ecef;
        }

        #preview {
            object-fit: cover;
        }

        /* استایل سفارشی برای ارورها */
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: block;
            padding: 0.5rem;
            background-color: #f8f9fa;
            border-radius: 0.25rem;
            border-right: 3px solid #dc3545;
            animation: fadeIn 0.3s ease-in-out;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .is-invalid:focus {
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script>
        // نمایش/مخفی کردن پسورد
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>
</div>
