<?php

return [
    'list' => ':name 一覧',
    'nav' => [
        'main' => 'マスタ管理',
        'collection' => '職種分類'
    ],
    'form' => [
        'header' => '職種分類追加',
        'input' => [
            'search' => '職種分類を検索',
            'create' => '職種分類追加'
        ],
        'button' => [
            'reset' => 'キャンセル',
            'submit' => '保存'
        ]
    ],
    'field' => [
        'name' => '職種分類 ',
        'created_at' => '作成日',
        'updated_at' => '修正日',
        'image' => [
            'label' => '画像追加',
            'button' => '画像追加'
        ],
        'priority' => [
            'label' => '順番'
        ],
        'job_category' => [
            'label' => '職種'
        ],
        'summary' => [
            'label' => '内容'
        ],
        'icon' => [
            'label' => 'アイコン画像',
            'button' => '画像追加'
        ],
    ],
    'modal' => [
        'delete' => [
            'title' => '削除確認',
            'content' => '本当に削除しますか?',
            'btn' => [
                'no' => 'いいえ',
                'yes' => 'はい '
            ]
        ]
    ],
    'validations' => [
        'name' => ['required' => '職種分類 is required', 'max' => '職種分類 max is :max'],
        'image' => ['required' => '画像追加 is required'],
        'summary' => ['required' => '内容 is required'],
        'category' => ['required' => '職種 is required'],
        'priority' => ['required' => '順番 is required'],
        'icon' => ['required' => 'アイコン画像 is required'],
    ],
];
