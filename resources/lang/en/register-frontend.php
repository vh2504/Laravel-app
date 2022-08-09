<?php
return [
    'page-title' =>'Register',

    'progress' => [
        'step1' =>'Step1',
        'step2' =>'Step2',
        'step3' =>'Step3'
    ],

    'supports' => [
        'title' =>'Three benefits of registering as a member',
        'support' => [
            'title' =>'Thorough advisor support',
            'summary' =>' Career advisor will support the selection measures according to your desired project with Zoom etc. '
        ],
        'job' => [
            'title' =>'Get a job that suits your wishes',
            'summary' =>' If you register your desired job type / area, we will send you a new job that meets the conditions by email. '
        ],
        'registered' => [
            'title' =>'Member-only features available',
            'summary' =>' You can use the functions you care about, the resume / CV creation function, and the member-only functions such as viewing the work environment. '
        ],
    ],

    'fields' => [
        'required' =>'(required)',
        'tab1' => [
            'email' => [
                'title' =>'For PC / Smartphone',
                'label' =>'email address',
                'placeholder' =>'example@email.co.jp',
            ],
            'password' => [
                'title' =>'Use when logging in',
                'label' =>'password',
                'placeholder' =>'8 or more single-byte alphanumerical symbols',
            ],
            'password_confirmation' => [
                'label' =>'Confirmation password',
                'placeholder' =>'8 or more single-byte alphanumerical symbols',
            ],
        ],
        'tab2' => [],
        'tab3' => [],
    ],

    'buttons' => [
        'next' =>'next',
        'prev' =>'Return',
        'submit' =>'Go to registration confirmation screen',
        'confirm' =>''
    ],

    'validations' => [
        'email' => [
            'required' =>'Please enter your email address',
            'regex' =>'Please enter the correct email address'
        ],
        'password' => [
            'required' =>'Enter password',
            'confirmed' =>'The passwords you entered do not match',
            'min' =>'Please enter a password of 8 characters or more'
        ],
        'password_confirmation' => ['required' =>'Enter new password']
    ],

    'messages' => [
        'error-page' =>'Page not found',
        'error' =>' Your email address or password is invalid. ',
        'email-unique' => 'Email is unique',
        'step1-success' =>' step1-ok'
    ]
];
?>
