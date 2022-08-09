<?php

return [
    'list' => 'List categories',
    'nav' => ['main' => 'Categories'],
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
        'description' => 'description',
        'created_at' => 'created date',
        'status' => 'status',
        'reason' => 'reason'
    ],
    'radios' => [
        'publish_now' => 'publish now',
        'publish_custom' => 'publish custom'
    ],
    'buttons' => [
        'create-new' => 'Create',
        'reject' => 'Reject',
        'approve' => 'Approve',
        'submit' => 'Save',
        'cancel' => 'Cancel',
        'search' => 'Search'
    ],
    'placeholders' => [
        'search-title' => 'Search category',
    ],
    'create' => 'Create Category',
    'create-page' => [
        'name' => 'Name',
        'description' => 'Description',
        'buttons' => [
            'cancel' => 'Cancel',
            'submit-create' => 'Save',
            'submit-draft' => 'Save Draft'
        ]
    ],
    'validations' => [
        'name' => ['required' => 'name category is required', 'max' => 'name category max is :max'],
        'description' => ['required' => 'description is required', 'max' => 'description max is :max'],
    ],
    'messages' => [
        'confirm-delete' => [
            'title' => 'Delete confirmation',
            'description' => 'Do you really want to delete this?'
        ],
        'update-success' => 'Update success.',
        'create-success' => 'Create success.',
        'delete-success' => 'Deleted success.'
    ]
];
