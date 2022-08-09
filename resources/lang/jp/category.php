<?php

return [
    'list' => '記事カテゴリー',
    'nav' => ['main' => '記事カテゴリー'],
    'status' => [
        'Rejected' => '拒否',
        'Pending' => '承認待ち',
        'Approved' => '投稿待ち',
        'Published' => '公開中',
        'NotPulished' => '投稿待ち',
        'Hidden' => '非公開',
        'Draft' => '下書き'
    ],
    'columns' => [
        'id' => '記事ID',
        'title' => 'カテゴリー名',
        'description' => '紹介文',
        'created_at' => '作成日',
        'status' => '状態',
        'reason' => '拒否理由'
    ],
    'radios' => [
        'publish_now' => 'すぐに投稿',
        'publish_custom' => '予定時間設定'
    ],
    'buttons' => [
        'create-new' => '新規記事作成',
        'reject' => '拒否',
        'approve' => '承認',
        'submit' => '保存',
        'cancel' => 'キャンセル',
        'search' => '検索'
    ],
    'placeholders' => [
        'search-title' => 'タイトルを検索',
    ],
    'create' => '記事カテゴリ登録',
    'create-page' => [
        'name' => 'タイトル',
        'description' => '紹介文',
        'buttons' => [
            'cancel' => 'キャンセル',
            'submit-create' => '保存',
            'submit-draft' => '下書きを保存'
        ]
    ],
    'validations' => [
        'name' => ['required' => 'タイトル is required', 'max' => 'タイトル max is :max'],
        'description' => ['required' => '紹介文 is required', 'max' => '紹介文 max is :max'],
    ],
    'messages' => [
        'confirm-delete' => [
            'title' => '削除確認',
            'description' => '本当に削除しますか?'
        ],
        'update-success' => '記事を編集しました',
        'create-success' => '新しい記事を作成しました',
        'delete-success' => '削除しました'
    ]
];
