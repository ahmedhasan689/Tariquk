@extends ('layouts.main')

@section('page_title', 'Sub-Admins')

@section('title')
    <h3 class="d-flex flex-column">
        <div>
            قائمة المشرفين
        </div>
        <div class="mt-3 mb-6 flex-row-reverse">
            <a href="{{ route('subadmin.trash') }}">
                <button class="btn btn-sm btn-warning">
                    قائمة المحذوفات
                </button>
            </a>
        </div>
    </h3>

@endsection

@section('breadcrumb')
    <a href="{{ route('subadmin.index') }}">
        Subadmin
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

                <td class="d-flex">
                    <a href="{{ route('subadmin.edit', ['id' => $subadmin->id]) }}" class="mr-2">
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="far fa-edit"></i>
                            تعديل
                        </button>
                    </a>

                    <form action="{{ route('subadmin.delete', ['id' => $subadmin->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="far fa-trash-alt"></i>
                            حذف
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
