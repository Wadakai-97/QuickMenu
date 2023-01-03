@extends('layouts.app')

@section('title', 'RecipeCreate')
@section('content')
<h1 class='mb-5'>レシピ登録</h1>

@if (session('success_message'))
    <div class="alert alert-success text-center">
        {{ session('success_message') }}
    </div>
@endif
@if (session('failed_message'))
    <div class="alert alert-danger text-center">
        {{ session('failed_message') }}
    </div>
@endif

<form action="{{ route('menu.store') }}" method="POST">
    @csrf
    <div class="mb-3 form-group @if(!empty($errors->first('timezone'))) has-error @endif">
        <label for="TimeZone" class="form-label">時間帯</label>
        <span class="badge bg-danger">必須</span>
        <select class="form-select" name="timezone" id="TimeZone" aria-label="Default select example">
            <option disabled selected>未選択</option>
            @foreach (RecipeConsts::TIMEZONE_LIST as $key => $timezone)
            <option value="{{ $timezone }}" @if(old('timezone') === $timezone) selected @endif>{{ $timezone }}</option>
            @endforeach
        </select>
        <span class="help-block text-danger">{{$errors->first('timezone')}}</span>
    </div>
    <div class="mb-3 form-group @if(!empty($errors->first('category'))) has-error @endif">
        <label for="Category" class="form-label">カテゴリー</label>
        <span class="badge bg-danger">必須</span>
        <select class="form-select" name="category" id="Category" aria-label="Default select example">
            <option disabled selected>未選択</option>
            @foreach (RecipeConsts::CATEGORY_LIST as $key => $category)
            <option value="{{ $category }}" @if(old('category') === $category) selected @endif>{{ $category }}</option>
            @endforeach
        </select>
        <span class="help-block text-danger">{{$errors->first('category')}}</span>
    </div>
    <div class="mb-3 form-group @if(!empty($errors->first('dish_name'))) has-error @endif">
        <label for="DishName" class="form-label">料理名</label>
        <span class="badge bg-danger">必須</span>
        <input type="text" id="DishName" class="form-control" name="dish_name" value="">
        <span class="help-block text-danger">{{$errors->first('dish_name')}}</span>
    </div>
    <div class="mb-3">
        <label for="Memo" class="form-label">メモ</label>
        <input type="text" id="Memo" class="form-control" name="memo" value="">
    </div>
    <div class="mb-3">
        <label for="Url" class="form-label">URL</label>
        <input type="text" id="Url" class="form-control" name="url" value="">
    </div>
    <button type="submit" class="btn btn-primary mt-3">登録</button>
</form>
@endsection
