<?php

return [
    'nav' => [
        'main' => '特徴'
    ],
    'create' => '特徴登録',
    'update' => '特徴登録',
    'list' => '特徴一覧',
    'columns' => [
        'name' => '職種名',
        'type_group' => '特徴グループ',
        'job_category' => '職種',
        'created_at' => '作成日'
    ],
    'buttons' => [
        'create-new' => '特徴追加',
        'submit' => '保存',
        'cancel' => 'キャンセル',
        'search' => '検索'
    ],
    'placeholders' => [
        'name' => '特集名を検索',
        'type_group' => '職種グループ',
        'job_category' => '職種'
    ],
    'type_group' => [
        'label' => '職種種類',
        'medical_subjects' => '診療科目の特徴',
        'service' => 'サービス形態の特徴',
        'job_description' => '仕事内容の特徴',
        'welfare' => '給与・待遇・福利厚生の特徴',
        'working_time' => '勤務時間の特徴',
        'holiday' => '休日の特徴',
        'application_requirements' => '応募要件の特徴',
        'access' => 'アクセスの特徴',
    ],
    'validations' => [
        'name' => ['required' => '特集名を検索 is required', 'max' => 'タイトル max is :max'],
        'type_group' => ['required' => '職種グループ is requred'],
    ],
    'job_category_orther' => '職種分類はいていない',
    'messages' =>[
        'confirm-delete' => [
            'title' => '削除確認',
            'description' => '本当に削除しますか?'
        ],
        'update-success' => '特徴を編集しました',
        'create-success' => '特徴を登録しました',
        'delete-success' => '削除しました'
    ]
];
