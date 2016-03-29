@extends('layout.layout-user')
@section('title')
    {{ trans('category/titles.category') }}
@endsection
@section('title-content')
    {{ trans('category/titles.category') }}
@endsection
@section('content')
    <div class="category col-md-12">
        @foreach ($categoryList as $categoryAll)
        <div class="category-item col-md-12">
            <div class="content-cate col-md-8">
                <div class="title col-md-12">
                    <div class="title-ca col-md-4">{{ $categoryAll['name'] }}</div>
                    <div class="title-ca1 col-md-8">{{ trans('text.youLearned') }} 20/50</div>
                </div>
                <div class="content-ct col-md-12">
                    @foreach ($categoryAll['words'] as $value)
                        {{ $value['content'] }}
                    @endforeach
                </div>
                <div class="click-button col-md-12">
                    <button type="button" class="btn btn-primary">{{ trans('text.startLesson') }}</button>
                </div>
            </div>
            <div class="image-cate col-md-3">
                <img src="{{ asset("/uploads/category/{$categoryAll['image']}") }}">
            </div>
        </div>
        @endforeach
    </div>
@endsection
