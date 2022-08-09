<?php
return [
    'page-title' => '新規会員登録',

    'progress' => [
        'step1' => 'ログイン情報',
        'step2' => '基本情報',
        'step3' => '希望条件'
    ],

    'supports' => [
        'title' => '会員登録する3つのメリット',
        'support' => [
            'title' => 'アドバイザーの徹底サポート',
            'summary' => 'キャリアアドバイザーが、Zoom等でご希望の案件に合わせて選考対策をサポートします。'
        ],
        'job' => [
            'title' => '希望に合った求人が届く',
            'summary' => '希望の職種・エリアなどを登録いただければ条件にあった新着求人をメールでお送りします。'
        ],
        'registered' => [
            'title' => '会員限定機能が利用できる',
            'summary' => '気になる機能や履歴書・職務経歴書作成機能、職場の環境の閲覧など会員限定機能が利用できます。'
        ],
    ],

    'fields' => [
        'required' => '（必須）',
        'tab1' => [
            'email' => [
                'title' => 'パソコン用/スマートフォン用 どちらでも可',
                'label' => 'メールアドレス',
                'placeholder' => 'example@email.co.jp',
            ],
            'password' => [
                'title' => 'ログインする際に使用します',
                'label' => 'パスワード',
                'placeholder' => '半角英数字記号8文字以上 ',
            ],
            'password_confirmation' => [
                'label' => '確認用パスワード',
                'placeholder' => '半角英数字記号8文字以上 ',
            ],
        ],
        'tab2' => [
            'fullname' => [
                'label' => '氏名',
                'fn-plh' => '山田',
                'ln-plh' => '花子'
            ],
            'fullname_hira' => [
                'label' => 'ふりがな',
                'fn-plh' => 'やまだ',
                'ln-plh' => 'はなこ'
            ],
            'birthday' => [
                'label' => '生年月日',
                'year' => '西暦',
                'month' => '月',
                'day' => '日'
            ],
            'gender' => [
                'label' => '性別',
                'female' => '女性',
                'male' => '男性'
            ],
            'zipcode' => [
                'label' => '郵便番号',
                'placeholder' => '郵便番号を入力'
            ],
            'address' => [
                'label' => '住所',
                'prefecture' => '都道府県を選択',
                'city' => '市区町村・町名を選択',
                'address-plh' => '町内・番地',
                'town-plh' => '建物名'
            ],
            'phone' => [
                'label' => '電話番号',
                'placeholder' => '電話番号を入力'
            ],
            'job_situation' => [
                'label' => '現在の就業状況',
                'work' => '就業中',
                'unemployed' => '離職中',
                'study' => '在学中'
            ]
        ],
        'tab3' => [],
    ],

    'buttons' => [
        'next' => 'つぎへ',
        'prev' => 'もどる',
        'submit' => '登録確認画面へ',
        'confirm' => ''
    ],

    'validations' => [
        'email' => [
            'required' => 'メールアドレスを入力してください',
            'regex' => '正しいメールアドレスを入力してください'
        ],
        'password' => [
            'required' => 'パスワードを入力してください',
            'confirmed' => '入力したパスワードが一致していません',
            'min' => '8文字以上のパスワードを入力してください'
        ],
        'password_confirmation' => ['required' => '新しいパスワードを入力してください'],
        'fullname' => [
            'fn_required' => '名字を入力してください',
            'fn_max' => '名字は50文字以内で入力してください',
            'ln_required' => '名前を入力してください',
            'ln_max' => '名前は50文字以内で入力してください'
        ],
        'fullname_hira' => [
            'fn_required' => '名字（ひらがな）を入力してください',
            'fn_max' => '名字（ふりがな）は50文字以内で入力してください',
            'fn_format' => '名字（ふりがな）はひらがなで入力してください',
            'ln_required' => '名前（ふりがな）は50文字以内で入力してください',
            'ln_max' => '名前（ひらがな）を入力してください',
            'fn_format' => '名前（ふりがな）はひらがなで入力してください',
        ],
        'birthday' => [
            'required' => '生年月日を選択してください',
        ],
        'gender' => [
            'required' => '性別を選択してください',
        ],
        'zipcode' => [
            'format' => '正しい郵便番号を入力してください',
            'format_unique' => '郵便番号が見つかりません'
        ],
        'address' => [
            'prefecture_required' => '都道府県を選択してください',
            'city_required' => '市区町村を選択してください',
        ],
        'number_phone' => [
            'required' => '電話番号を入力してください',
            'format' => '正しい電話番号を入力してください'
        ],
        'job_situation' => [
            'required' => '就業状況を選択してください'
        ]
    ],

    'messages' => [
        'error-page' => 'ページが見つかりません',
        'error' => 'メールアドレスもしくはパスワードが不正です。',
        'email-unique' => '登録済みのメールアドレスです',
        'step1-success' => 'step1-ok',
        'step-error' => 'error',
    ]
];
?>
