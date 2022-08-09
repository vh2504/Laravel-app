<?php

return [
    'nav' => [
        'main' => '利用者の声'
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
        'fullname' => '利用者名',
        'age' => '年齢',
        'email' => 'メールアドレス',
        'job_category' => '職種',
        'created_at' => '作成日',
        'rate' => '満足度',
        'note' => '転職で重視したポイント',
        'comment' => 'DYMを利用した感想',
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
        'search' => '検索',
        'back' => '戻る'
    ],
    'placeholders' => [
        'status' => '状態',
        'search-title' => 'タイトルを検索',
        'category' => 'カテゴリー'
    ],
    'list' => 'ご利用者の声一覧',
    'create' => '新規記事を作成',
    'show' => 'ご利用者の声詳細',
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
        'reason' => ['required' => '拒否理由を入力してください'],
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
        'delete-success' => '削除しました'
    ]
];
