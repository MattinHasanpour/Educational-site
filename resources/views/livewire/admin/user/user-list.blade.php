<div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">مدیریت کاربران</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="form-group row mb-4">
                <label class="col-sm-2 col-form-label font-weight-bold">جستجوی کاربران</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg border-primary text-left"
                               dir="rtl" wire:model="search" placeholder="جستجو بر اساس نام، ایمیل یا موبایل...">
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
                    <th class="text-center align-middle font-weight-bold" style="width: 50px;">#</th>
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


                <!-- نمونه ردیف دوم -->
                <tr class="transition-all">
                    <td class="text-center align-middle font-weight-bold">1</td>
                    <td class="text-center align-middle">
                        <div class="avatar avatar-xl">
                            <img src="https://via.placeholder.com/150" class="rounded-circle shadow-sm" alt="پروفایل کاربر">
                        </div>
                    </td>
                    <td class="text-center align-middle font-weight-bold">فاطمه محمدی</td>
                    <td class="text-center align-middle text-info">fatemeh@example.com</td>
                    <td class="text-center align-middle">09129876543</td>
                    <td class="text-center align-middle">
                        <span class="badge badge-pill badge-warning">مشتری</span>
                    </td>
                    <td class="text-center align-middle">
                            <span class="badge badge-pill badge-secondary py-2 px-3">
                                <i class="fas fa-times-circle mr-1"></i> غیرفعال
                            </span>
                    </td>
                    <td class="text-center align-middle">
                        <div class="btn-group btn-group-sm">
                            <button class="btn mx-2 btn-outline-primary rounded" title="ویرایش">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-outline-danger rounded" title="حذف">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                    <td class="text-center align-middle text-muted">1404/02/15</td>
                </tr>
                </tbody>
            </table>

            <nav class="mt-4">
                <ul class="pagination pagination-rounded justify-content-center shadow-sm">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="قبلی">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="بعدی">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
