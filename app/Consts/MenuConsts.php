<?php

namespace App\Consts;

class MenuConsts
{
    // 時間帯
    public const TIMEZONE_01 = "朝食";
    public const TIMEZONE_02 = "昼食";
    public const TIMEZONE_03 = "夕食";
    public const TIMEZONE_LIST = [
        1 => self::TIMEZONE_01,
        2 => self::TIMEZONE_02,
        3 => self::TIMEZONE_03,
    ];

    // カテゴリー
    public const CATEGORY_01 = "和食";
    public const CATEGORY_02 = "洋食";
    public const CATEGORY_03 = "中華";
    public const CATEGORY_04 = "アジア";
    public const CATEGORY_05 = "カレー";
    public const CATEGORY_06 = "焼肉";
    public const CATEGORY_07 = "鍋";
    public const CATEGORY_08 = "その他";
    public const CATEGORY_LIST = [
        1 => self::CATEGORY_01,
        2 => self::CATEGORY_02,
        3 => self::CATEGORY_03,
        4 => self::CATEGORY_04,
        5 => self::CATEGORY_05,
        6 => self::CATEGORY_06,
        7 => self::CATEGORY_07,
        8 => self::CATEGORY_08
    ];
}
