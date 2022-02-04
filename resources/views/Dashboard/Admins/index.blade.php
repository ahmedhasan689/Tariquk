@extends ('layouts.main')

@section('page_title', 'Admins')

@section('title')
<h3 class="d-flex flex-column">
    <div>
        قائمة المشرفين
    </div>
    <div class="mt-3 mb-6 flex-row-reverse">
        <a href="#">
            <button class="btn btn-sm btn-warning">
                قائمة المحذوفات
            </button>
        </a>
    </div>
</h3>

@endsection

@section('breadcrumb')
<a href="{{ route('admin.index') }}">
    Admin
</a>
@endsection


@section('content')

<!-- Read Flash MSG -->
@if (Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif




<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">الصورة الشخصية</th>
            <th scope="col">الأسم</th>
            <th scope="col">رقم الجوال</th>
            <th scope="col">الايميل</th>
            <th scope="col">الدولة</th>
            <th scope="col">نوع الاشتراك</th>
            <th scope="col">خيارات</th>
        </tr>
    </thead>
    <tbody>
       
        <tr>
            <th scope="row"></th>
            <td>
                <img src="#" width="100" height="80">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="d-flex">
                <a href="{{ route('admin.create') }}" class="mr-2">
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="far fa-edit"></i>
                        تعديل
                    </button>
                </a>

                <form action="#" method="POST">
                    
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="far fa-trash-alt"></i>
                        حذف
                    </button>
                </form>
            </td>
        </tr>

    </tbody>
</table>
@endsection
