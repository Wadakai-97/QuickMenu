<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = [
        'timezone',
        'category',
        'dish_name',
        'memo',
        'url',
        'created_at',
        'updated_at',
    ];

    /**
     * メニュー一覧を取得する。
     * @return array|null
     */
    public static function getList() {
        return Menu::paginate(10);
    }

    /**
     * 検索条件からメニュー情報を絞り込む。
     * @param array $request 検索条件
     * @return array|null
     */
    public static function search($request) {
        $query = Menu::query();
        return $query->whereTimezone($query, Arr::pluck($request, 'timezone'))
                        ->whereCategory($query, $request)
                        ->whereDishName($query, $request)
                        ->get();
    }

    /**
     * 入力情報を登録する。
     *
     * @param array $request 入力情報
     * @return bool
     */
    public static function store($request) {
        return Menu::create([
            "timezone" => $request['timezone'],
            "category" => $request['category'],
            "dish_name" => $request['dish_name'],
            "memo" => $request['memo'],
            "url" => $request['url']
        ]);
    }

    /**
     * メニュー情報を削除する。
     *
     * @param string $id メニューID
     * @return bool
     */
    public static function dataDestroy($id) {
        return Menu::destroy($id);
    }


    // 時間帯 完全一致
    public function scopeWhereTimezone($query, $request) {
        $timezone = $request->timezone;
        if(!empty($timezone)) {
            $query->where('timezone', '=', $timezone);
        }
    }

    // 分類 完全一致
    public function scopeWhereCategory($query, $request) {
        $category = $request->category;
        if(!empty($category)) {
            $query->where('category', '=', $category);
        }
    }

    // 料理名 部分一致
    public function scopeWhereDishName($query, $request) {
        $dish_name = $request->dish_name ?? '';
        if(!empty($dish_name)) {
            $query->where('dish_name', 'like', '%'.addcslashes($dish_name, '%_\\').'%');
        }
    }
}
