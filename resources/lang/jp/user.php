<?php

return [
    'nav' => [
        'title' => '会員情報',
    ],

    'label' => [
        'list' => '会員数 : ',
        'list_end' => '人 ',
        'name' => '名前',
        'birthday' => '年齢',
        'year_old' => '歳',
        'email' => 'メールアドレス',
        'created_at' => '登録日',
        'count_job_apply' => '応募回数',
        'status' => '状態',
        'active' => '有効',
        'in_active' => '無効',

        'export' => [
            'file_name' => '会員情報_',
            'id' => 'id',
            'email' => 'メールアドレス1',
            'status' => '状態',
            'name' => '氏名',
            'name_hira' => 'ふりがな',
            'birthday' => '生年月日',
            'sex' => '性別',
            'zipcode' => '郵便番号',
            'pre_id' => 'pre_id',
            'city_id' => 'city_id',
            'address' => '町名・番地1',
            'town' => '建物名1',
            'address_hira' => '住所1ふりがな',
            'number_phone' => '電話番号',
            'zipcode2' => '郵便番号2',
            'pre_id2' => 'pre_id2',
            'city_id2' => 'city_id2',
            'address2' => '町名・番地2',
            'town2' => '建物名2',
            'address_hira2' => '住所2ふりがな',
            'number_phone2' => '電話番号2',
            'email2' => 'メールアドレス2',
            'note' => '連絡時の注意点',
            'job_situation' => '現在の就業状況',
            'dependant' => '扶養家族',
            'marital_status' => '配偶者',
            'info' => '自己PR',
            'favourite' => 'favourite',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
            'picture' => '顔写真',

            'degrees_type' => '最終学歴',
            'school_name' => '学校名',
            'department' => '学部・学科',
            'major' => '専攻',
            'degree' => '卒業区分',
            'graduation_date' => '卒業年月',

            'job' => '経歴',
            'company_name' => '勤務先名',
            'job_content' => '事業内容',
            'start' => '勤務開始',
            'end' => '勤務終了',
            'job_situation' => '勤務形態',
            'job_category_id' => '職種',
            'salary' => '給与',
            'position' => '役職',

            'job_desine' => [
                'category' => '希望職種/経験年数',
                'address' => '希望勤務地',
                'job_situation' => '希望勤務形態',
                'start_date' => '希望入職時期',
                'salary' => '希望年収(万）',
                'feature' => 'こだわり条件',
            ]
        ],

        'detail' => [
            'title' => 'プロフィール',
            'image' => '顔写真',
            'basic-info' => '基本情報',
            'name' => '名前',
            'first_name_hira' => 'ふりがな',
            'email' => 'メールアドレス',
            'sex' => '性別',
            'male' => '男性',
            'female' => '女性',
            'birthday_year' => '生年月日',
            'job_situation' => '現在の就業状況',
            'job_category' => '職種',
            'zipcode' => '郵便番号',
            'number_phone' => '電話番号',
            'station' => '自宅最寄駅',
            'dependant' => '配偶者',
            'dependant_yes' => 'あり',
            'address' => '住所',
            'info' => '自己PR',
            'education' => '学歴',
            'certificate_type' => '最終学歴',

            'certificate_type_option' => [
                'default' => '選択する',
                'higt_school' => '高等学校',
                'college_of_technology' => '高等専門学校',
                'junior_college' => '短期大学',
                'the_university' => '大学',
                'graduate_school_master' => '大学院(修士)',
                'graduate_school_phd' => '大学院(博士)',
                'vocational_school' => '専門学校',
                'others' => 'その他',
            ],

            'school_name' => '学校名',
            'department' => '学部・学科',
            'major' => '専攻',

            'degree' => '卒業区分',
            'degree_option' => [
                'default' => '選択する',
                'graduation' => '卒業',
                'drop_out' => '中退',
                'expected_graduation' => '卒業見込み'
            ],

            'graduation' => '卒業年月',
			'experience' => '職務経歴',
			'experience_no' => '経歴',
            'company_name' => '勤務先名',
            'start_date' => '勤務開始',
            'end_date' => '勤務終了',

            'job_situation' => '勤務形態',
            'job_situation_option' => [
                'default' => '選択する',
                'regular_staff' => '正職員',
                'contract_staff' => '契約職員',
                'part_time_job' => 'パート・バイト',
                'business_entrustment' => '業務委託',
            ],

            'marital' => [
                'IsMarital' => 'あり',
                'IsNotMarital' => 'なし',
            ],

            'position' => '役職',
            'position_option' => [
                'default' => '選択する',
                'none' => 'なし',
                'head_doctor' => '医院長/副医院長',
                'other' => 'その他',
            ],

            'salary_type' => [
                'default' => '選択する',
                'annual_income' => '年収',
                'monthly_income' => '月収',
                'daily' => '日給',
                'hourly_wage' => '時給',
            ],

            'job_desine' => [
                'category_title' => '希望条件',
                'address' => '希望勤務地',
                'job_situation' => '希望勤務形態',
                'expectation' => '希望入職時期',
                'expectation_option' => [
                    'none' => '特になし',
                    'now' => '今すぐに',
                    'one_month' => '1ヶ月以内',
                    'three_month' => '3ヶ月以内',
                    'more_three_month' => '3ヶ月以上先',
                ],
                'salary' => '希望年収',
                'salary_unit' => '万円',
                'feature' => 'こだわり条件',
            ],

            'salary' => '給与',
            'job_content' => '仕事内容',
            'feature' => '希望条件',
            'job_apply' => '応募済み求人',
            'job_name' => '求人名',
            'job_type' => '職種',
            'office_name' => '施設名',
            'job_address' => '住所',
            'job_salary' => '給与',
            'apply_time' => '応募期間',
        ]
    ],

    'placeholders' => [
        'search' => 'メールアドレス、名前を検索',
    ],

    'btn' => [
        'search' => '検索',
        'export' => 'CSVをエクスポート'
    ],

    'msg' => [
        'active-success' => 'このアカウントのブロックを解除させていただきました。',
        'inactive-success' => 'このアカウントはブロックさせていただきました。',
    ],

    'modal' => [
        'change-status' => [
            'title-lock' => '本当にブロックしますか?',
            'title-unlock' => '本当にブロックを解除しますか?',
            'content' => '本当にブロックしますか?',
        ]
    ]
];
