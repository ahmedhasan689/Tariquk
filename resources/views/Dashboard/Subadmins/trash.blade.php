@extends ('layouts.main')

@section('page_title', 'Deleted Sub-Admins')

@section('title')
    <h3>
        قائمة المشرفين المحذوفين
        <div class="d-flex mt-3">
            <form action="{{ route('subadmin.restore')}}" method="POST" class="mx-1">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-sm btn-warning">أستعادة الكل</button>
            </form>
            <form action="{{ route('subadmin.force-delete')}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">حذف الكل</button>
            </form>
        </div>
    </h3>

@endsection

@section('breadcrumb')
    <a href="{{ route('subadmin.index') }}">
        Sub-Admin
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

        @foreach($subadmins as $subadmin)
            <tr>
                <th scope="row">{{ $subadmin->id }}</th>
                <td>
                    <img src="{{ asset('uploads') . '/' . $subadmin->avatar }}" width="100" height="80">
                </td>
                <td>{{ $subadmin->name }}</td>
                <td>{{ $subadmin->phone_number }}</td>
                <td>{{ $subadmin->email }}</td>
                <td>{{ $subadmin->city->city_name }}</td>
                <td>{{ $subadmin->deleted_at }}</td>

                <td class="d-flex">
                    <form action="{{ route('subadmin.restore', ['id' => $subadmin->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <a href="{{ route('subadmin.restore', ['id' => $subadmin->id]) }}" class="mr-2">
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="far fa-edit"></i>
                                أستعادة
                            </button>
                        </a>
                    </form>

                    <form action="{{ route('subadmin.force-delete', ['id' => $subadmin->id] ) }}" method="POST">
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
