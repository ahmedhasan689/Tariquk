@extends ('layouts.main')

@section('page_title', 'Middle City')

@section('title')
<h3 class="d-flex flex-column">
    <div>
        قائمة البلاغات
    </div>
</h3>

@endsection



@section('content')




<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">أسم المستخدم</th>
            <th scope="col">المدينة</th>
            <th scope="col">الشارع</th>
            <th scope="col">الحدث</th>
            <th scope="col">وسائط</th>
            <th scope="col">خيارات</th>
        </tr>
    </thead>
    <tbody>

        @foreach($reports as $report)
        <tr>
            <th scope="row">{{ $report->id }}</th>
            <td>{{ $report->user->first_name }}</td>
            <td>{{ $report->city->city_name }}</td>
            <td>{{ $report->street }}</td>
            <td>{{ $report->content }}</td>

            @if($report->media)
            <td class="text-success">Yes</td>
            @else
            <td class="text-danger">No</td>
            @endif

            <td class="d-flex">
                <form action="{{ route('city.update', ['id' => $report->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <a class="mr-2">
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fas fa-check"></i>
                        </button>
                    </a>
                </form>

                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection