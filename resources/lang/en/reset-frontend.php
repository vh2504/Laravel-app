<?php
    return [
        'page-title' => [
            'reset'     => 'reset',
            'success'   => 'success',
            'form'      => 'form',
        ],
        'description' => 'After entering your email address, press the "Reset Password" button. A URL for resetting your password will be sent to your registered e-mail address.',
        'registers' => [
            'link' => 'Click here to register as a new member',
            'unaccount' => 'Not a member yet?',
            'question' => 'If you register as a member, you will be able to use useful functions'
        ],
        'fields' => [
            'email' => 'email',
            'password' => 'password',
            'password-confirmation' => 'confirm password'
        ],
        'placeholder' => [
            'email' => 'sample@email.co.jp',
            'password-min' => 'At least 8 characters'
        ],
        'buttons' => [
            'submit-reset' => 'Reset your password',
            'submit-form' => 'submit',
            'top' => 'Go to Top'
        ],
        'validations' => [
            'email' => ['required' => 'The email field is required.'],
            'email-unregister' => 'The e-mail address you entered is not registered',
            'password' => [
                'required' => 'The password field is required.',
                'min' => 'The password must be at least 8 characters',
                'confirmed' => 'the passwords you entered do not match'
            ],
            'password-confirmation' => ['required' => 'The password-confirmation field is required.']
        ],
        'messages' => [
            'error' => 'The e-mail address you entered is not registered.',
            'error-form' => 'the password was not updated',
            'success-reset' => 'Please confirm that we have sent the URL for password reset to the e-mail address you entered.',
            'success-form' => 'Password updated',
        ]
    ];
?>
