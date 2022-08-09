<?php

return [
    'list' => '職種',
    'nav' => '職種',
    'form' => [
        'header' => '職種登録',
        'input' => [
            'search' => '職種分類を検索',
            'create' => '職種分類追加'
        ],
        'button' => [
            'search' => '検索',
            'create' => '新規登録',
            'reset' => 'キャンセル',
            'submit' => '保存'
        ]
    ],
    'field' => [
        'name' => [
            'label' => '職種名',
            'placeholder' => '看護師/准看護師',
            'search' => '職種名を検索'
        ],
        'created_at' => '作成日',
        'updated_at' => '修正日',
        'type' => [
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
        'feature' => [
            'label' => '特徴'
        ],
        'image' => [
            'label' => '画像',
            'button' => '画像追加'
        ],
        'is_popular' => 'Popular',
        'collection' => '職種分類',
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
        'name' => ['required' => '職種名 is required', 'max' => '職種名 max is :max'],
        'image' => ['required' => 'バナー is required'],
        'collection_id' => ['required' => '職種分類 is required'],
        'feature_id' => ['required' => '特徴 is required'],
        'icon' => ['required' => 'アイコン画像 is required'],
    ],
    'messages' => [
        'created_success' => 'Job category created success.',
        'updated_success' => 'Job category updated success.',
        'not_found' => 'Job category not found.'
    ]
];
