<?php

return [
    'menu' => [
        'list' => [
            'file_name' => 'メニュー一覧',
            'header' => [
                'id' => 'ID',
                'timezone' => '時間帯',
                'category' => '分類',
                'dish_name' => '料理名',
                'memo' => 'メモ',
                'url' => 'URL',
            ],
            'condition' => [
                'timezone',
                'category',
                'dish_name',
            ],
        ],
    ],
];
