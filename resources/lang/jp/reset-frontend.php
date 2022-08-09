<?php
    return [
        'page-title' => [
            'reset'     => 'パスワードをお忘れの方',
            'success'   => 'パスワードの再設定',
            'form'      => 'パスワードの変更',
        ],
        'description' => 'メールアドレスを入力後「パスワードを再設定する」ボタンを押してください。ご登録のメールアドレスまでパスワード再設定用のURLが送信されます。',
        'registers' => [
            'link' => '新規会員登録はこちら',
            'unaccount' => 'まだ会員でない方',
            'question' => '会員登録していただくと便利な機能が使えるようになります。'
        ],
        'fields' => [
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'password-confirmation' => '新しいパスワード（確認）'
        ],
        'placeholder' => [
            'email' => 'sample@email.co.jp',
            'password-min' => '８文字以上'
        ],
        'buttons' => [
            'submit-reset' => 'パスワードを再設定する',
            'submit-form' => '保存する',
            'top' => 'トップへ移動する'
        ],
        'validations' => [
            'email' => ['required' => 'メールアドレスを入力してください'],
            'email-unregister' => '入力されたメールアドレスは登録されていません。',
            'password' => [
                'required' => '新しいパスワードを入力してください',
                'min' => '8文字以上のパスワードを入力してください',
                'confirmed' => '入力したパスワードが一致していません'
            ],
            'password-confirmation' => ['required' => '新しいパスワード （確認）を入力してください']
        ],
        'messages' => [
            'error' => '入力されたメールアドレスは登録されていません。',
            'error-form' => 'パスワードが更新されませんでした。',
            'success-reset' => '⼊⼒いただいたメールアドレス宛に、パスワード再設定用のURLを送付いたしましたのでご確認ください。',
            'success-form' => 'パスワードが更新されました。',
        ]
    ];
?>
