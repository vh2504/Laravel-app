<?php

return [
    'nav' => [
        'main' => 'お知らせ'
    ],
    'create' => 'お知らせ登録',
    'update' => 'お知らせ登録',
    'list' => 'お知らせ一覧',
    'columns' => [
        'title' => 'タイトル',
        'published_at' => '投稿日',
        'content' => '内容',
        'status' => '掲載状態'
    ],
    'buttons' => [
        'create-new' => '新規登録',
        'submit' => '保存',
        'cancel' => 'キャンセル',
        'search' => '検索'
    ],
    'status' => [
        'published' => '公開中',
        'pending' => '投稿待ち'
    ],
    'validations' => [
        'title' => ['required' => 'タイトル is required', 'max' => 'タイトル max is :max'],
        'published_at' => ['required' => '職種グループ is required'],
        'content' => ['required' => '内容 is required']
    ],
    'messages' =>[
        'confirm-delete' => [
            'title' => '削除確認',
            'description' => '本当に削除しますか?'
        ],
        'update-success' => 'お知らせを編集しました',
        'create-success' => 'お知らせを登録しました',
        'delete-success' => '削除しました'
    ]
];
