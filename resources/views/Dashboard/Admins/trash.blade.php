@extends ('layouts.main')

@section('page_title', 'Admins')

@section('title')
    <h3>
        قائمة المشرفين المحذوفين
        <div class="d-flex mt-3">
            <form action="{{ route('admin.restore')}}" method="POST" class="mx-1">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-sm btn-warning">أستعادة الكل</button>
            </form>
            <form action="{{ route('admin.force-delete')}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">حذف الكل</button>
            </form>
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
            <th scope="col">المدينة</th>
            <th scope="col">تاريخ الحذف</th>
            <th scope="col">خيارات</th>
        </tr>
        </thead>
        <tbody>

        @foreach($admins as $admin)
            <tr>
                <th scope="row">{{ $admin->id }}</th>
                <td>
                    <img src="{{ asset('uploads') . '/' . $admin->avatar }}" width="100" height="80">
                </td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->phone_number }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->city->city_name }}</td>
                <td>{{ $admin->deleted_at }}</td>

                <td class="d-flex">
                    <form action="{{ route('admin.restore', ['id' => $admin->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <a href="{{ route('admin.restore', ['id' => $admin->id]) }}" class="mr-2">
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="far fa-edit"></i>
                                أستعادة
                            </button>
                        </a>
                    </form>

                    <form action="{{ route('admin.force-delete', ['id' => $admin->id] ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="far fa-trash-alt"></i>
                            حذف نهائي
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
