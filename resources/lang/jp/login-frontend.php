<?php
    return [
        'page-title' => 'Login',
        'title' => 'ログイン',
        'registers' => [
            'unaccount' => 'まだ会員でない方',
            'question' => '会員登録していただくと便利な機能が使えるようになります。'
        ],
        'fields' => [
            'email' => 'メールアドレス',
            'password' => 'パスワード'
        ],
        'buttons' => [
            'submit' => 'ログイン',
            'forgot' => 'パスワードをお忘れの方',
            'register' => '無料で会員登録する'
        ],
        'validations' => [
            'email' => ['required' => 'パスワードを入力してください', 'email' => 'メールアドレスを入力してください'],
            'password' => ['required' => 'パスワードを入力してください', 'min' => '8文字以上のパスワードを入力してください']
        ],
        'messages' => [
            'error' => 'メールアドレスもしくはパスワードが不正です。'
        ]
    ];
?>
