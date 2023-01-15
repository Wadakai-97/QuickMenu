@extends('layouts.app')

@section('title', 'RecipeCreate')
@section('content')
<h1 class="mb-5">メニューリスト</h1>

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

<form class="row g-3 mb-5" action="{{ route('menu.search') }}" method="POST">
    @csrf
    <div class="col-md-4">
        <label for="TimeZone" class="form-label">時間帯</label>
        <select class="form-select" name="timezone" id="TimeZone" aria-label="Default select example">
            <option disabled selected>未選択</option>
            @foreach (RecipeConsts::TIMEZONE_LIST as $key => $timezone)
            <option value="{{ $timezone }}" @if(old('timezone') === $timezone) selected @endif>{{ $timezone }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label for="Category" class="form-label">カテゴリー</label>
        <select class="form-select" name="category" id="Category" aria-label="Default select example">
            <option disabled selected>未選択</option>
            @foreach (RecipeConsts::CATEGORY_LIST as $key => $category)
            <option value="{{ $category }}" @if(old('category') === $category) selected @endif>{{ $category }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label for="validationDefaultUsername" class="form-label">料理名</label>
        <div class="input-group">
        <input type="text" class="form-control" name="dish_name" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2">
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">検索</button>
    </div>
</form>

<table class="table table-light table-striped">
    <thead>
        <tr class="table-dark">
            <th>時間帯</th>
            <th>分類</th>
            <th>料理名</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $key => $menu)
        <tr>
            <td>{{ $menu->timezone }}</td>
            <td>{{ $menu->category }}</td>
            <td>{{ $menu->dish_name }}</td>
            <td><a class="btn btn-primary" href="{{ route('menu.detail', ['id' => $menu->id]) }}" role="button">詳細</a></td>
            <td>
                <form action="{{ route('menu.destroy', ['id' => $menu->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $menus->links() }}
@endsection
