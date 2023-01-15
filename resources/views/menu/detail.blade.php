@extends('layouts.app')

@section('title', 'RecipeDetail')
@section('content')
<h1>レシピ詳細</h1>

<table class="table table-light table-striped">
    <thead>
        <tr class="table-dark">
            <th colspan="3">詳細</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>時間帯</th>
            <td>{{ $menu->timezone }}</td>
        </tr>
        <tr>
            <th>カテゴリー</th>
            <td>{{ $menu->category }}</td>
        </tr>
        <tr>
            <th>料理名</th>
            <td>{{ $menu->dish_name }}</td>
        </tr>
        <tr>
            <th>メモ</th>
            <td>{{ $menu->memo }}</td>
        </tr>
        <tr>
            <th>ＵＲＬ</th>
            <td>{{ $menu->url }}</td>
        </tr>
        <tr>
            <th>作成日</th>
            <td>{{ $menu->created_at }}</td>
        </tr>
        <tr>
            <th>更新日</th>
            <td>{{ $menu->updated_at }}</td>
        </tr>
    </tbody>
</table>

@endsection
