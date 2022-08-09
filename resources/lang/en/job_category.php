<?php

return [
    'list' => 'List job categories',
    'nav' => 'Job category',
    'form' => [
        'header' => 'Create job category',
        'input' => [
            'search' => 'Search name job category',
            'create' => 'Create'
        ],
        'button' => [
            'search' => 'Search',
            'create' => 'Create',
            'reset' => 'Reset',
            'submit' => 'Submit'
        ]
    ],
    'field' => [
        'name' => [
            'label' => 'Job category',
            'placeholder' => 'Name job category',
            'search' => 'Search'
        ],
        'created_at' => 'Created date',
        'updated_at' => 'Updated date',
        'type' => [
            'label' => 'Type',
            'medical_subjects' => 'Medical subjects',
            'service' => 'Service',
            'job_description' => 'Job',
            'welfare' => 'Welfare',
            'working_time' => 'Working time',
            'holiday' => 'Holiday',
            'application_requirements' => 'Application requirements',
            'access' => 'Access',
        ],
        'feature' => [
            'label' => 'Feature'
        ],
        'image' => [
            'label' => 'Image',
            'button' => 'Choose image'
        ],
        'is_popular' => 'Popular',
        'collection' => 'Collection',
        'icon' => [
            'label' => 'Icon',
            'button' => 'Choose icon'
        ],
    ],
    'modal' => [
        'delete' => [
            'title' => 'Deletion Confirmation',
            'content' => 'Are you sure you want to delete it?',
            'btn' => [
                'no' => 'no',
                'yes' => 'yes '
            ]
        ]
    ],
    'validations' => [
        'name' => ['required' => 'name job category is required', 'max' => '職種名 max is :max'],
        'image' => ['required' => 'image is required'],
        'collection_id' => ['required' => 'collection is required'],
        'feature_id' => ['required' => 'feature is required'],
        'icon' => ['required' => 'icon is required'],
    ],
    'messages' => [
        'created_success' => 'Job category created success.',
        'updated_success' => 'Job category updated success.',
        'not_found' => 'Job category not found.'
    ]
];
