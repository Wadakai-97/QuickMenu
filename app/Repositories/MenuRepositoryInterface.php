<?php

namespace App\Repositories;

interface MenuRepositoryInterface
{
    // メニュー一覧を取得する。
    public function getList();

    // メニューを検索条件で絞り込んで取得する。
    public function find($request);

    // メニューを登録する。
    public function create($request);

    // メニューを削除する。
    public function destroy($id);
}
