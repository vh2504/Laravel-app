<?php

return [
    'nav' => [
        'main' => 'Administrators'
    ],

    'label' => [
        'list' => 'List Admins',
        'add-title' => 'Create admin',
        'edit-title' => 'Edit admin',
        'list-title' => 'List admin',
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirmation' => 'Password confirm',
        'old_password' => 'Old password',
        'created_at' => 'Created date',
        'status' => 'Status',
        'active' => 'Active',
        'inactive' => 'Inactive',
    ],

    'modal' => [
        'delete' => [
            'title' => 'Deletion Confirmation',
            'content' => 'Are you sure you want to delete it?',
        ]
    ],

    'placeholders' => [
        'search' => 'Search name',
    ],

    'message' => [
        'create-success' => 'Created admin account.',
        'update-success' => 'Changed administrator information.',
    ],

    'btn' => [
        'save' => 'Save',
        'cancel' => 'Cancel',
        'create' => 'Create',
        'search' => 'Search',
    ],

    'msg' => [
        'name_required' => 'The name field is required.',
        'name_max' => 'The name may not be greater than :max characters.',
        'email_required' => 'The email field is required.',
        'email_email' => 'The email must be a valid email address.',
        'email_unique' => 'The email has already been taken.',
        'email_max' => 'The email may not be greater than :max characters.',
        'password_required' => 'The password field is required.',
        'password_regex' => 'The password format is invalid.The :attribute format is invalid.',
        'password_max' => 'The password may not be greater than :max characters.',
        'password_confirmed' => 'The password confirmed confirmation does not match.',
        'password_min' => 'The password must be at least :min characters.',
    ]
    
]

?>