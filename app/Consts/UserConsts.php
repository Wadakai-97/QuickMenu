<?php

namespace App\Consts;

class UserConsts
{
    // 役職
    public const ROLE_01 = "社員";
    public const ROLE_02 = "役職者";
    public const ROLE_03 = "管理者";
    public const ROLE_LIST = [
        100 => self::ROLE_01,
        200 => self::ROLE_02,
        999 => self::ROLE_03,
    ];
}
