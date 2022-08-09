<?php
    return [
        'page-title' => 'Login',
        'title' => 'Login',
        'registers' => [
            'unaccount' => 'No have account?',
            'question' => 'If you register as a member, you will be able to use useful functions.'
        ],
        'fields' => [
            'email' => 'email',
            'password' => 'password'
        ],
        'buttons' => [
            'submit' => 'login',
            'forgot' => 'forgot password',
            'register' => 'register'
        ],
        'validations' => [
            'email' => ['required' => 'The email field is required.', 'email' => 'The :attribute must be a valid email address.'],
            'password' => ['required' => 'The password field is required.', 'min' => 'Please enter a password that is at least 8 characters long']
        ],
        'messages' => [
            'error' => 'The email address or password is invalid.'
        ]
    ];
?>
