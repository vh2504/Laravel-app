<?php

return [
    'nav' => [
        'main' => '記事管理'
    ],
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
        'title' => 'タイトル',
        'category' => 'カテゴリー',
        'creator' => '著者',
        'hashtag' => 'Hashtag',
        'status' => '状態'
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
        'status' => '状態',
        'search-title' => 'タイトルを検索',
        'category' => 'カテゴリー'
    ],
    'list' => '記事一覧',
    'create' => '新規記事を作成',
    'show' => '記事詳細',
    'create-page' => [
        'image' => 'バナー',
        'chose-file' => '画像追加',
        'title' => 'タイトル',
        'status' => '状態',
        'published_at' => '投稿時間設定',
        'check-now' => 'すぐに投稿',
        'check-custom' => '予定時間設定',
        'category' => 'カテゴリー',
        'hastag' => '職種タグ',
        'summary' => '紹介文',
        'content' => '内容',
        'buttons' => [
            'cancel' => 'キャンセル',
            'submit-create' => '保存',
            'submit-draft' => '下書きを保存'
        ]
    ],
    'validations' => [
        'status' =>  ['required' => '状態 is required'],
        'title' => ['required' => 'タイトル is required', 'max' => 'タイトル max is :max'],
        'image' => ['required' => 'バナー is required'],
        'category' => ['required' => 'カテゴリー is required'],
        'summary' => ['required' => '紹介文 is required', 'max' => '紹介文 max is :max'],
        'content' => ['required' => '内容 is required', 'max' => '内容 max is :max'],
        'published_at' => ['required' => '投稿時間設定 is required'],
        'is_popular' =>['max' => '人気記事は最大3つだけを設定できます']
    ],
    'show-page' => [
        'status' => '状態',
        'creator' => '著者',
        'published_at' => '公開日',
        'updated_at' => '更新日'
    ],
    'messages' => [
        'confirm-delete' => [
            'title' => '削除確認',
            'description' => '本当に削除しますか?'
        ],
        'update-success' => '記事を編集しました',
        'create-success' => '新しい記事を作成しました',
    ]
];
