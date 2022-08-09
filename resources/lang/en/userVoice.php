<?php

return [
    'nav' => [
        'main' => 'User voices'
    ],
    'status' => [
        'Rejected' => 'Rejected',
        'Pending' => 'Pending',
        'Approved' => 'Approved',
        'Published' => 'Published',
        'NotPulished' => 'Not Published',
        'Hidden' => 'Hidden',
        'Draft' => 'Draft'
    ],
    'columns' => [
        'id' => 'id',
        'fullname' => 'fullname',
        'age' => 'age',
        'email' => 'email',
        'job_category' => 'job category',
        'created_at' => 'created date',
        'rate' => 'rate',
        'note' => 'note',
        'comment' => 'Impressions of using DYM',
        'status' => 'status',
        'reason' => 'reason'
    ],
    'radios' => [
        'publish_now' => 'publish now',
        'publish_custom' => 'publish custom'
    ],
    'buttons' => [
        'create-new' => 'Create',
        'reject' => 'reject',
        'approve' => 'approve',
        'submit' => 'Submit',
        'cancel' => 'Cancel',
        'search' => 'Search',
        'back' => 'Back'
    ],
    'placeholders' => [
        'status' => 'status',
        'search-title' => 'Search title',
        'category' => 'category'
    ],
    'list' => 'List user voices',
    'create' => 'Create',
    'show' => 'Show',
    'create-page' => [
        'image' => 'Image',
        'chose-file' => 'Chose file',
        'title' => 'Title',
        'status' => 'Status',
        'published_at' => 'Published date',
        'check-now' => 'now',
        'check-custom' => 'custom',
        'category' => 'Category',
        'hastag' => 'Hashtag',
        'summary' => 'Summary',
        'content' => 'Content',
        'buttons' => [
            'cancel' => 'Cancel',
            'submit-create' => 'Create',
            'submit-draft' => 'Save Draft'
        ]
    ],
    'validations' => [
        'status' =>  ['required' => 'status is required'],
        'title' => ['required' => 'title is required', 'max' => 'タイトル max is :max'],
        'image' => ['required' => 'image is required'],
        'category' => ['required' => 'category is required'],
        'summary' => ['required' => 'summary is required', 'max' => '紹介文 max is :max'],
        'content' => ['required' => 'content is required', 'max' => '内容 max is :max'],
        'published_at' => ['required' => 'published date is required'],
        'reason' => ['required' => 'reason is required'],
        'is_popular' =>['max' => 'popular is required.']
    ],
    'show-page' => [
        'status' => 'status',
        'creator' => 'creator',
        'published_at' => 'published date',
        'updated_at' => 'updated date'
    ],
    'messages' => [
        'confirm-delete' => [
            'title' => 'Deletion Confirmation',
            'description' => 'Are you sure you want to delete it?'
        ],
        'update-success' => 'Updated success.',
        'create-success' => 'Created success.',
        'delete-success' => 'Deleted success.'
    ]
];
