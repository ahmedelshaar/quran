@extends('admin.layout.app')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">تعديل شيخ</h4>
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success mx-2 px-2 py-1">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('sheikh.update', $sheikh) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name">الاسم</label>
                                    <input type="text" id="first-name" class="form-control" name="name" placeholder="الاسم" required value="{{$sheikh->name}}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="nickname">الكنية</label>
                                    <input type="text" id="nickname" class="form-control" name="nickname" placeholder="الكنية" value="{{ $sheikh->nickname }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="country">البلد</label>
                                    <select class="form-select" id="country" name="country_id">
                                        <option selected disabled>اختار الدولة</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}"
                                                    @if($sheikh->country->id == $country->id)
                                                        selected
                                                    @endif
                                            >{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="notes">ملاحظات</label>
                                    <textarea class="form-control" id="notes" rows="3" placeholder="ملاحظات" name="notes">{{$sheikh->notes}}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">حفظ</button>
                                <button type="reset" class="btn btn-outline-secondary waves-effect">اعادة ضبط</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
