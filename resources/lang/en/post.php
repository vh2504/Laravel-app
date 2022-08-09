<?php

return [
    'nav' => [
        'main' => 'Posts'
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
        'title' => 'title',
        'category' => 'category',
        'creator' => 'creator',
        'hashtag' => 'Hashtag',
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
        'search' => 'Search'
    ],
    'placeholders' => [
        'status' => 'status',
        'search-title' => 'Search title post',
        'category' => 'Category'
    ],
    'list' => 'List posts',
    'create' => 'Create post',
    'show' => 'show',
    'create-page' => [
        'image' => 'image',
        'chose-file' => 'choose file',
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
            'submit-draft' => 'Save draft'
        ]
    ],
    'validations' => [
        'status' =>  ['required' => 'status is required'],
        'title' => ['required' => 'title is required', 'max' => 'title max is :max'],
        'image' => ['required' => 'image is required'],
        'category' => ['required' => 'category is required'],
        'summary' => ['required' => 'summary is required', 'max' => 'summary max is :max'],
        'content' => ['required' => 'content is required', 'max' => 'content max is :max'],
        'published_at' => ['required' => 'published_at is required'],
        'reason' => ['required' => 'The reason field is required.'],
        'is_popular' =>['max' => 'The is_popular may not be greater than :max.']
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
