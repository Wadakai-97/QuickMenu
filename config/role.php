<?php

return[
    'role' => [
        // 一般ユーザー
        '100' => [
        ],

        // 管理者
        '999' => [
            'menu_editor',
        ],
    ],

    'policy' => [
        // メニュー編集権限
        'menu_editor',
    ],
];
