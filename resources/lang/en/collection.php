<?php

return [
    'list' => 'List :name',
    'nav' => [
        'main' => 'Collection manager',
        'collection' => 'Collection'
    ],
    'form' => [
        'header' => 'Create Collection',
        'input' => [
            'search' => 'Search Collection',
            'create' => 'Create'
        ],
        'button' => [
            'reset' => 'Reset',
            'submit' => 'Create'
        ]
    ],
    'field' => [
        'name' => 'Collection',
        'created_at' => 'created date',
        'updated_at' => 'updated date',
        'image' => [
            'label' => 'Image',
            'button' => 'Choose image'
        ],
        'priority' => [
            'label' => 'priority'
        ],
        'job_category' => [
            'label' => 'Job categories'
        ],
        'summary' => [
            'label' => 'Summary'
        ],
        'icon' => [
            'label' => 'Icon',
            'button' => 'Choose icon'
        ],
    ],
    'modal' => [
        'delete' => [
            'title' => 'Delete Collection Information',
            'content' => 'Do you really want to delete this?',
            'btn' => [
                'no' => 'Cancel',
                'yes' => 'Yes'
            ]
        ]
    ],
    'validations' => [
        'name' => ['required' => 'name collection is required', 'max' => 'name collection max is :max'],
        'image' => ['required' => 'image is required'],
        'summary' => ['required' => 'summary is required'],
        'category' => ['required' => 'category is required'],
        'priority' => ['required' => 'priority is required'],
        'icon' => ['required' => 'icon is required'],
    ],
];
