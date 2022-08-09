<?php

return [
    'nav' => [
        'main' => 'Features'
    ],
    'create' => 'Create feature',
    'update' => 'Update feature',
    'list' => 'List Features',
    'columns' => [
        'name' => 'Name',
        'type_group' => 'Feature group',
        'job_category' => 'Job category',
        'created_at' => 'created date'
    ],
    'buttons' => [
        'create-new' => 'Create',
        'submit' => 'Submit',
        'cancel' => 'Cancel',
        'search' => 'Search'
    ],
    'placeholders' => [
        'name' => 'Search for feature name',
        'type_group' => 'Feature group',
        'job_category' => 'Job category'
    ],
    'type_group' => [
        'label' => 'Feature group',
        'medical_subjects' => 'Medical Subjects',
        'service' => 'Service',
        'job_description' => 'Job description',
        'welfare' => 'Welfare',
        'working_time' => 'Working time',
        'holiday' => 'Holiday',
        'application_requirements' => 'Application requirements',
        'access' => 'Access',
    ],
    'validations' => [
        'name' => ['required' => 'name is required', 'max' => 'name max is :max'],
        'type_group' => ['required' => 'type group is required'],
    ],
    'job_category_orther' => 'Job category other',
    'messages' =>[
        'confirm-delete' => [
            'title' => 'Deletion Confirmation',
            'description' => 'Are you sure you want to delete it?'
        ],
        'update-success' => 'Updated success.',
        'create-success' => 'Created success.',
        'delete-success' => 'Deleted success.'
    ]
];
