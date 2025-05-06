<div>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="container-fluid">
                <h5 class="card-title mb-4 text-primary">
                    <i class="fas fa-user-plus me-2"></i>
                    ایجاد کاربر جدید
                </h5>

                <form method="POST" class="needs-validation" novalidate>
                    <!-- ردیف اول - نام و ایمیل -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="name" class="form-label fw-semibold">نام و نام خانوادگی</label>
                            <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-user text-muted"></i>
                            </span>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" required>
                                <div class="invalid-feedback">
                                    لطفاً نام کاربر را وارد کنید
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">ایمیل</label>
                            <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-envelope text-muted"></i>
                            </span>
                                <input type="email" class="form-control form-control-lg" id="email" name="email"
                                       required>
                                <div class="invalid-feedback">
                                    لطفاً یک ایمیل معتبر وارد کنید
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ردیف دوم - موبایل و پسورد -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="mobile" class="form-label fw-semibold">موبایل</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">+98</span>
                                <input type="tel" class="form-control form-control-lg" id="mobile" name="mobile"
                                       required>
                                <div class="invalid-feedback">
                                    لطفاً شماره موبایل را وارد کنید
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label fw-semibold">پسورد</label>
                            <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-lock text-muted"></i>
                            </span>
                                <input type="password" class="form-control form-control-lg" id="password"
                                       name="password" required>
                                <button class="btn btn-light" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <div class="invalid-feedback">
                                    لطفاً رمز عبور را وارد کنید
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ردیف سوم - شبکه‌های اجتماعی -->
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <label for="whatsapp" class="form-label fw-semibold">واتساپ</label>
                            <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fab fa-whatsapp text-success"></i>
                            </span>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                       placeholder="شماره واتساپ">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3 mb-md-0">
                            <label for="telegram" class="form-label fw-semibold">تلگرام</label>
                            <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fab fa-telegram text-primary"></i>
                            </span>
                                <input type="text" class="form-control" id="telegram" name="telegram"
                                       placeholder="آیدی تلگرام">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="instagram" class="form-label fw-semibold">اینستاگرام</label>
                            <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fab fa-instagram text-danger"></i>
                            </span>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                       placeholder="آیدی اینستاگرام">
                            </div>
                        </div>
                    </div>

                    <!-- آپلود عکس -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="file" class="form-label fw-semibold">آپلود عکس پروفایل</label>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img id="preview" src="https://via.placeholder.com/100"
                                         class="rounded-circle border w-24 h-24" width="80" height="80" alt="Preview">
                                </div>
                                <div class="flex-grow-1">
                                    <input type="file" class="form-control" id="file" accept="image/*">
                                    <div class="form-text">فرمت‌های مجاز: JPG, PNG (حداکثر 2MB)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- دکمه ارسال -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary btn-lg px-4 py-2">
                            <i class="fas fa-save me-2"></i>
                            ذخیره کاربر
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
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
    </style>

    <script>
        // نمایش پیش‌نمایش عکس
        document.getElementById('file').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    document.getElementById('preview').src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

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

        // اعتبارسنجی فرم
        (function () {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
        })();
    </script>
</div>
