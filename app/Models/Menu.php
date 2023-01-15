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
