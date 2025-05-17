<div>
    <button class="bg-blue-600 px-4 py-1 my-2 rounded-md" wire:click="$refresh">بروزرسانی</button>
    <button wire:click="$set('search','')" class="bg-blue-600 px-4 py-1 my-2 text-white rounded-md">پاک کردن</button>

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white flex justify-between">
            <h4 class="mb-0">مدیریت کاربران</h4>
            <span class="font-bold"> تعداد کل کاربران<span class="font-bold text-gray-100 size-16">: {{ $users->total() }}</span></span>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-info m-3">
                {{ session('message') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <div class="form-group row mb-4">
                    <label class="col-sm-2 col-form-label font-weight-bold">جستجوی کاربران</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg border-primary text-left"
                                   dir="rtl" wire:model.live="search"
                                   placeholder="جستجو بر اساس نام، ایمیل یا موبایل...">
                            <div class="input-group-append">
                            <span class="input-group-text bg-primary text-white">
                                <i class="fas fa-search"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-hover table-bordered">
                    <thead class="bg-light-primary">
                    <tr>
                        <th class="text-center align-middle font-weight-bold" style="width: 50px;">
                            <div class="flex text-center" wire:click="$toggle('sortId')">
                                @if ($sortId)
                                    <i class=" icon ti-arrow-down"></i>
                                @else
                                    <i class=" icon ti-arrow-up"></i>
                                @endif
                            </div>
                        </th>
                        <th class="text-center align-middle font-weight-bold" style="width: 80px;">تصویر</th>
                        <th class="text-center align-middle font-weight-bold">نام کامل</th>
                        <th class="text-center align-middle font-weight-bold">ایمیل</th>
                        <th class="text-center align-middle font-weight-bold">موبایل</th>
                        <th class="text-center align-middle font-weight-bold">نقش‌ها</th>
                        <th class="text-center align-middle font-weight-bold" style="width: 100px;">وضعیت</th>
                        <th class="text-center align-middle font-weight-bold" style="width: 120px;">عملیات</th>
                        <th class="text-center align-middle font-weight-bold" style="width: 150px;">تاریخ ثبت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $index=>$user)
                        <tr class="transition-all">
                            <td class="text-center align-middle font-weight-bold">{{ $user->id }}</td>
                            <td class="text-center align-middle">
                                <div class="avatar avatar-xl w-16 h-16 rounded-full bg-gray-300">
                                    <img
                                        src="{{ $user->image ? asset('photos/'.$user->image) : asset("https://img.icons8.com/?size=100&id=13042&format=png&color=000000") }}"
                                        class="rounded-circle shadow-sm" alt="پروفایل کاربر">
                                </div>
                            </td>
                            <td class="text-center align-middle font-weight-bold">{{ $user->name }}</td>
                            <td class="text-center align-middle text-info">{{ $user->email }}</td>
                            <td class="text-center align-middle">{{ $user->mobile }}</td>
                            <td class="text-center align-middle">
                                <span class="badge badge-pill badge-warning">مشتری</span>
                            </td>
                            <td class="text-center align-middle">
                                <span class="badge badge-pill badge-secondary py-2 px-3">
                                    <i class="fas fa-times-circle mr-1 "></i> غیرفعال
                                </span>
                            </td>
                            <td class="text-center align-middle">
                                <div class="btn-group btn-group-sm">
                                    <button class="btn mx-2 btn-outline-primary rounded" title="ویرایش"
                                            data-toggle="modal"
                                            data-target="#userEditModal{{ $user->id }}"
                                            wire:click="editRow({{ $user->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-danger rounded" title="حذف">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="text-center align-middle text-muted">{{ $user->created_at }}</td>
                        </tr>

                        <!-- مدال ویرایش برای هر کاربر -->
                        <div class="modal fade" id="userEditModal{{ $user->id }}" tabindex="-1" role="dialog"
                             aria-labelledby="userEditModalLabel{{ $user->id }}"
                             aria-hidden="true" wire:ignore.self>
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title" id="userEditModalLabel{{ $user->id }}">ویرایش
                                            کاربر شماره {{ $user->id }}</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form wire:submit.prevent="UpdateRow({{ $user->id }})" class="needs-validation"
                                              novalidate>
                                            <!-- ردیف اول - نام و ایمیل -->
                                            <div class="row mb-4">
                                                <div class="col-md-6 mb-3 mb-md-0">
                                                    <label for="name{{ $user->id }}" class="form-label fw-semibold">نام
                                                        و
                                                        نام خانوادگی</label>
                                                    <div class="input-group">
                                                    <span class="input-group-text bg-light">
                                                        <i class="fas fa-user text-muted"></i>
                                                    </span>
                                                        <input type="text"
                                                               class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                               id="name{{ $user->id }}"
                                                               wire:model.defer="name">
                                                    </div>
                                                    @error('name')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3 mb-md-0">
                                                    <label for="mobile{{ $user->id }}"
                                                           class="form-label fw-semibold">موبایل</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light">+98</span>
                                                        <input type="tel"
                                                               class="form-control form-control-lg @error('mobile') is-invalid @enderror"
                                                               id="mobile{{ $user->id }}"
                                                               wire:model.defer="mobile">
                                                    </div>
                                                    @error('mobile')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                            </div>

                                            <!-- ردیف دوم - ایمیل  -->
                                            <div class="row mb-4">

                                                <div class="col-md-12">
                                                    <label for="email{{ $user->id }}"
                                                           class="form-label fw-semibold">ایمیل</label>
                                                    <div class="input-group">
                                                    <span class="input-group-text bg-light">
                                                        <i class="fas fa-envelope text-muted"></i>
                                                    </span>
                                                        <input type="email"
                                                               class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                               id="email{{ $user->id }}"
                                                               wire:model.defer="email">
                                                    </div>
                                                    @error('email')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- دکمه ویرایش -->
                                            <div class="d-flex justify-content-end mt-4">
                                                <button type="button" class="btn btn-secondary btn-lg px-4 py-2 mr-2"
                                                        data-dismiss="modal">
                                                    <i class="fas fa-times me-2"></i>
                                                    انصراف
                                                </button>
                                                <button type="submit" wire:loading.attr="disabled"
                                                        class="btn btn-primary btn-lg px-4 py-2">
                                                    <i class="fas fa-save me-2"></i>
                                                    <span wire:loading.remove>ذخیره تغییرات</span>
                                                    <span wire:loading>
                                                        در حال ذخیره...
                                                        <span class="spinner-grow spinner-grow-sm"></span>
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
{{--        صفحه یندی      --}}
                <nav class="mt-4">
                    <ul class="flex items-center justify-center space-x-1">
                        <!-- Previous Page Link -->
                        @if ($users->onFirstPage())
                            <li class="disabled">
                                <span class="px-3 py-1 rounded-md text-gray-400 cursor-not-allowed">&laquo;</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $users->previousPageUrl() }}" class="px-3 py-1 rounded-md bg-white border border-gray-200 hover:bg-gray-50 transition-colors" rel="prev">&laquo;</a>
                            </li>
                        @endif

                        <!-- Pagination Elements -->
                        @php
                            // تعداد صفحات قابل نمایش (حداکثر ۶ صفحه)
                            $maxVisiblePages = 6;
                            $half = floor($maxVisiblePages / 2);
                            $start = max($users->currentPage() - $half, 1);
                            $end = min($start + $maxVisiblePages - 1, $users->lastPage());

                            // اگر صفحات باقیمانده کمتر از حداکثر باشد
                            if ($end - $start + 1 < $maxVisiblePages) {
                                $start = max($end - $maxVisiblePages + 1, 1);
                            }
                        @endphp

                            <!-- صفحه اول (اگر در محدوده قابل نمایش نباشد) -->
                        @if ($start > 1)
                            <li>
                                <a href="{{ $users->url(1) }}" class="px-3 py-1 rounded-md bg-white border border-gray-200 hover:bg-gray-50 transition-colors">1</a>
                            </li>
                            @if ($start > 2)
                                <li class="px-2 py-1">...</li>
                            @endif
                        @endif

                        <!-- صفحات میانی -->
                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i == $users->currentPage())
                                <li>
                                    <span class="px-3 py-1 rounded-md bg-blue-500 text-white font-medium">{{ $i }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $users->url($i) }}" class="px-3 py-1 rounded-md bg-white border border-gray-200 hover:bg-gray-50 transition-colors">{{ $i }}</a>
                                </li>
                            @endif
                        @endfor

                        <!-- صفحه آخر (اگر در محدوده قابل نمایش نباشد) -->
                        @if ($end < $users->lastPage())
                            @if ($end < $users->lastPage() - 1)
                                <li class="px-2 py-1">...</li>
                            @endif
                            <li>
                                <a href="{{ $users->url($users->lastPage()) }}" class="px-3 py-1 rounded-md bg-white border border-gray-200 hover:bg-gray-50 transition-colors">{{ $users->lastPage() }}</a>
                            </li>
                        @endif

                        <!-- Next Page Link -->
                        @if ($users->hasMorePages())
                            <li>
                                <a href="{{ $users->nextPageUrl() }}" class="px-3 py-1 rounded-md bg-white border border-gray-200 hover:bg-gray-50 transition-colors" rel="next">&raquo;</a>
                            </li>
                        @else
                            <li class="disabled">
                                <span class="px-3 py-1 rounded-md text-gray-400 cursor-not-allowed">&raquo;</span>
                            </li>
                        @endif
                    </ul>
                </nav>
                {{--       پایان صفحه یندی      --}}

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                // گوش دادن به رویداد بستن مدال
                Livewire.on('closeModal', (userId) => {
                    $('#userEditModal' + userId).modal('hide');
                });
            });
            // جلوگیری از بسته شدن مدال هنگام کلیک خارج از آن
            $(document).ready(function () {
                $('.modal').on('show.bs.modal', function (e) {
                    if (!e.relatedTarget) return;
                    $(this).attr('data-backdrop', 'static');
                    $(this).attr('data-keyboard', 'false');

                    // ریست کردن حالت نمایش رمز عبور هنگام باز شدن مدال
                    const modal = $(this);
                    setTimeout(() => {
                        modal.find('input[type="text"][id^="password"]').each(function () {
                            const inputId = $(this).attr('id');
                            const button = $(this).closest('.input-group').find('button');
                            if (button.length) {
                                const icon = button.find('i');
                                $(this).attr('type', 'password');
                                icon.removeClass('fa-eye-slash').addClass('fa-eye');
                            }
                        });
                    }, 100);
                });

                // ریست فرم هنگام بسته شدن مدال
                $('.modal').on('hidden.bs.modal', function () {
                    Livewire.emit('resetForm');
                });
            });
        </script>
    @endpush
</div>
