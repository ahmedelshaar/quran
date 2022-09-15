@extends('admin.layout.app')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اضافة شيخ</h4>
                </div>
                <div class="card-body">
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-75">
                                <span class="fw-bolder me-25">الاسم:</span>
                                <span>{{ $sheikh->name }}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">الكنية:</span>
                                <span>{{ $sheikh->nickname }}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">الدولة:</span>
                                <span class="badge bg-light-success">{{ $sheikh->country->name }}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">ملاحظات:</span>
                                <span>{{ $sheikh->notes }}</span>
                            </li>
                        </ul>
                        <div class="col-12">
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
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
