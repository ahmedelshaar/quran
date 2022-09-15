@extends('admin.layout.app')


@section('content')
    <section class="app-user-list">
        <div class="card" >
            <div class="card-body border-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">الشيوخ</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('sheikh.create') }}">
                            <button class="d-block add-new btn btn-primary ms-auto"><span>اضافة شيخ جديد</span></button>
                        </a>
                    </div>
                    <div class="col-md-12">
                        @if(session()->has('message'))
                            <div class="alert alert-success px-2 py-1">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="user-list-table table">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>الاسم</th>
                        <th>اجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sheikhs as $sheikh)
                    <tr>
                        <td>{{ $sheikh->id }}</td>
                        <td>{{ $sheikh->name }}</td>
                        <td>
                            <a href="{{ route('sheikh.show', $sheikh->id) }}">
                                <button class="btn btn-primary ms-auto"><span>عرض الشيخ</span></button>
                            </a>
                            <a href="{{ route('sheikh.edit', $sheikh->id) }}">
                                <button class="btn btn-warning ms-auto"><span>تعديل</span></button>
                            </a>
                            <div class="d-inline-block">
                                <form method="post" action="{{ route('sheikh.destroy', $sheikh) }}">
                                    @csrf
                                        @method('DELETE')
                                    <button class="btn btn-danger ms-auto"><span>حذف الشيخ</span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {!! $sheikhs->links() !!}
        </div>
    <!-- list and filter end -->
    </section>

@endsection

@section('scripts')


@endsection
