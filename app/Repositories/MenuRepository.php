<?php

namespace App\Repositories;

use App\Models\Menu;

class MenuRepository implements MenuRepositoryInterface
{
    /**
     * メニュー一覧を取得する。
     * @return array|null
     */
    public function getList()
    {
        return Menu::paginate(10);
    }

    /**
     * メニューを検索条件で絞り込んで取得する。
     * @param array $request 検索条件
     * @return array|null
     */
    public function find($request)
    {
        return Menu::query()
                    ->whereTimezone($request)
                    ->whereCategory($request)
                    ->whereDishName($request)
                    ->paginate(15);
    }

    /**
     * メニューを登録する。
     *
     * @param array $request 入力情報
     * @return bool
     */
    public function create($request)
    {
        return Menu::create([
            "timezone" => $request['timezone'],
            "category" => $request['category'],
            "dish_name" => $request['dish_name'],
            "memo" => $request['memo'],
            "url" => $request['url']
        ]);
    }

    /**
     * メニューを削除する。
     *
     * @param string $id メニューID
     * @return bool
     */
    public function destory($id)
    {
        return Menu::destroy($id);
    }
}
