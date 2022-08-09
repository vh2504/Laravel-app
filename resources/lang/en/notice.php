<?php

return [
    'nav' => [
        'main' => 'Notices'
    ],
    'create' => 'Create',
    'update' => 'Update',
    'list' => 'List notices',
    'columns' => [
        'title' => 'title',
        'published_at' => 'published date',
        'content' => 'content',
        'status' => 'status'
    ],
    'buttons' => [
        'create-new' => 'Create',
        'submit' => 'Submit',
        'cancel' => 'Cancel',
        'search' => 'Search'
    ],
    'status' => [
        'published' => 'published',
        'pending' => 'pending'
    ],
    'validations' => [
        'title' => ['required' => 'title is required', 'max' => 'title max is :max'],
        'published_at' => ['required' => 'published_at is required'],
        'content' => ['required' => 'content is required']
    ],
    'messages' =>[
        'confirm-delete' => [
            'title' => 'Deletion Confirmation',
            'description' => 'Are you sure you want to delete it?'
        ],
        'update-success' => 'Updated success.',
        'create-success' => 'Created success',
        'delete-success' => 'Deleted success'
    ]
];
