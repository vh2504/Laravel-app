<?php
return [
    'nav' => '求人管理',
    'list' => '求人一覧',
    'form' => [
        'header' => '求人登録',
        'input' => [
            'search' => '職種分類を検索',
            'create' => '職種分類追加'
        ],
        'button' => [
            'search' => '検索',
            'create' => '新規登録',
            'reset' => '下書きを保存',
            'save' => '登録する',
        ],
        'filter' => [
            'search' => [
                'placeholder' => '求人名を検索'
            ]
        ],
    ],
    'table' => [
        'column' => [
            'title' => '求人名',
            'job_category' => '職種',
            'description' => '仕事内容',
            'salary_type' => '雇用形態',
            'number_member_join' => '応募人数',
            'status' => '掲載状態'
        ]
    ],
    'field' => [
        'title' => [
            'label' => '求人名',
            'placeholder' => '医師'
        ],
        'content' => [
            'title' => '訴求文タイトル',
            'text' => '訴求文',
            'note' => '職種名詳細'
        ],
        'status' => [
            'label' => '掲載状態',
            'placeholder' => '公開',
            'show' => '公開',
            'hide' => '非公開',
            'option_default' => '状態',
            'drafts' => '下書き',
            'show_all' => 'すべて'
        ],
        'created_at' => '作成日',
        'updated_at' => '修正日',
        'image' => [
            'label' => '画像',
            'button' => '画像追加'
        ],
        'office_type' => [
            'label' => '施設業種・形態',
            'placeholder' => '病院'
        ],
        'job_category' => '雇用形態',
        'collection_id' => [
            'label' => '職種分類選択',
            'placeholder' => '医科'
        ],
        'postal_code' => [
            'label' => '郵便番号',
        ],
        'prefecture_id' => [
            'label' => '都道府県',
            'placeholder' => '大阪'
        ],
        'city_id' => [
            'label' => '市区町村',
        ],
        'category_id' => [
            'label' => '職種選択',
            'placeholder' => '医師'
        ],
        'description' => [
            'feature_ids' => '仕事内容',
            'text' => '仕事内容詳細'
        ],
        'office_name' => [
            'label' => '事業名'
        ],
        'office_address' => [
            'label' => '住所詳細'
        ],
        'type' => [
            'label' => '施設業種・形態',
            'placeholder' => '病院',
            'hospital' => '病院',
            'dentistry' => '歯科診療所・技工所',
            'relaxation' => '代替医療・リラクゼーション',
            'welfare' => '介護・福祉事業所',
            'pharmacy' => '薬局・ドラッグストア',
            'home_nursing' => '訪問看護ステーション',
            'childcare' => '保育園・幼稚園',
            'salon' => '美容・サロン・ジム',
            'other' => 'その他（企業・学校等）',
        ],
        'salary' => [
            'h' => '時給',
            'm' => '月給',
            'y' => '年給',
            'heading' => '給与',
            'pay' => '給与期間',
            'min' => '給与',
            'note' => '給与の備考',
            'type' => [
                'header' => '勤務形態選択',
                'label' => '雇用形態',
                'all' => 'すべて',
                'official_staff' => '正職員',
                'contract_staff' => '契約職員',
                'part_time' => 'バート・アルバイト',
                'outsourcing_staff' => '業務委託'
            ],
        ],
        'process' => [
            'heading' => '選考プロセス',
            'label' => '選考プロセス詳細',
        ],
        'service_form' => [
            'medical_subjects' => '診療科目',
            'service' => 'サービス形態',
        ],
        'treatment' => [
            'heading' => '待遇',
            'note' => '待遇詳細'
        ],
        'working_time' => [
            'heading' => '勤務時間',
            'note' => '勤務時間詳細',
        ],
        'holiday' => [
            'heading' => '休日',
            'note' => '休日詳細',
            'offline' => '長期休暇・特別休暇'
        ],
        'requirement' => [
            'heading' => '応募条件',
            'note' => '応募条件詳細',
            'priority' => '歓迎要件詳細',
        ],
        'address' => [
            'heading' => 'アクセス',
            'note' => '詳細住所'
        ],
        'name' => [
            'label' => '求人名を検索'
        ],
        'line_station' => [
            'line' => [
                'label' => '沿線'
            ],
            'station' => [
                'label' => '駅'
            ],
            'distance' => [
                'label' => '徒歩時間（分）'
            ]
        ]
    ],
    'heading' => [
        'job_content' => '募集内容',
        'job_type' => '募集職種',
        'job_description' => '仕事内容',
        'treatment_note' => '待遇詳細',
    ],
    'validations' => [
        'image' => ['required' => '画像 is required', 'max' => '画像 max is :max'],
        'title' => ['required' => '求人名 is required', 'max' => '求人名 max is :max'],

        'office_name' => ['required' => '事業名 is required', 'max' => '事業名 max is :max'],
        'postal_code' => ['required' => '郵便番号 is required', 'max' => '郵便番号 max is :max'],
        'prefecture_id' => ['required' => '郵便番号 is required', 'max' => '郵便番号 max is :max'],
        'content' => [
            'title' => ['required' => '訴求文タイトル is required', 'max' => '訴求文タイトル max is :max'],
            'text' => ['required' => '訴求文 is required', 'max' => '訴求文 max is :max']
        ],
        'collection_id' => ['required' => '職種分類選択 is required', 'max' => '職種分類選択 max is :max'],
        'category_id' => ['required' => '職種選択 is required', 'max' => '職種選択 max is :max'],
        'city_id' => ['required' => '市区町村 is required', 'max' => '市区町村 max is :max'],
        'description' => [
            'feature_id' => ['required' => '仕事内容 is required']
        ],
        'salary' => [
            'type' => ['required' => '勤務形態選択 is required'],
            'pay' => ['required' => '給与期間 is required'],
            'min' => ['required' => '給与 is required'],
        ],
        'working_time' => [
            'feature_id' => ['required' => '勤務時間 is required'],
            'note' => ['required' => '勤務時間詳細 is required'],
        ],
        'requirement' => [
            'feature_id' => ['required' => '応募条件 is required'],
            'note' => ['required' => '応募条件詳細 is required'],
        ],
        'process' => ['required' => '選考プロセス is required'],
        'status' => ['required' => '状態 is required'],
        'job_feature' => [
            '2' => [
                'required' => '仕事内容 is required'
            ],
            '4' => [
                'required' => '勤務時間 is required'
            ],
            '5' => [
                'required' => '休日 is required'
            ],
            '6' => [
                'required' => '応募条件 is required'
            ]
        ]
    ]
];
