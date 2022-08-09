<?php
return [
    'nav' => 'Jobs',
    'list' => 'List Jobs',
    'form' => [
        'header' => 'Create Job',
        'input' => [
            'search' => 'Search',
            'create' => 'Create'
        ],
        'button' => [
            'search' => 'Search',
            'create' => 'Create',
            'reset' => 'Reset',
            'save' => 'Save',
        ]
    ],
    'field' => [
        'title' => [
            'label' => 'Title',
            'placeholder' => 'Title'
        ],
        'content' => [
            'title' => 'Content',
            'text' => 'Appeal',
            'note' => 'Note'
        ],
        'status' => [
            'label' => 'Status',
            'placeholder' => 'status job',
            'show' => 'show',
            'hide' => 'hide'
        ],
        'created_at' => 'Created date',
        'updated_at' => 'Updated date',
        'image' => [
            'label' => 'Image',
            'button' => 'Choose image'
        ],
        'office_type' => [
            'label' => 'Office type',
            'placeholder' => 'Office type'
        ],
        'job_category' => 'Job category',
        'collection_id' => [
            'label' => 'Collection',
            'placeholder' => 'Collection'
        ],
        'postal_code' => [
            'label' => 'Postal code',
        ],
        'prefecture_id' => [
            'label' => 'Prefecture',
            'placeholder' => 'Prefecture'
        ],
        'city_id' => [
            'label' => 'City',
        ],
        'category_id' => [
            'label' => 'Category',
            'placeholder' => 'Category'
        ],
        'description' => [
            'feature_ids' => 'Description',
            'text' => 'Description'
        ],
        'office_name' => [
            'label' => 'Office name'
        ],
        'office_address' => [
            'label' => 'Office address'
        ],
        'type' => [
            'label' => 'Type Job',
            'placeholder' => 'hospital',
            'hospital' => 'hospital',
            'dentistry' => 'Dental clinic',
            'relaxation' => 'Alternative medicine',
            'welfare' => 'Welfare',
            'pharmacy' => 'Pharmacy',
            'home_nursing' => 'Home nursing',
            'childcare' => 'Childcare',
            'salon' => 'Salon',
            'other' => 'Others (companies, schools, etc.)',
        ],
        'salary' => [
            'h' => 'Hourly wage',
            'm' => 'Monthly',
            'y' => 'Annual give',
            'heading' => 'Salary',
            'pay' => 'pay',
            'min' => 'min',
            'note' => 'note',
            'type' => [
                'header' => 'Work type selection',
                'label' => 'Work type',
                'all' => 'all',
                'official_staff' => 'official staff',
                'contract_staff' => 'contract staff',
                'part_time' => 'part time',
                'outsourcing_staff' => 'outsourcing staff'
            ],
        ],
        'process' => [
            'heading' => 'Selection process',
            'label' => 'process',
        ],
        'service_form' => [
            'medical_subjects' => 'medical subjects',
            'service' => 'service',
        ],
        'treatment' => [
            'heading' => 'treatment',
            'note' => 'treatment'
        ],
        'working_time' => [
            'heading' => 'working time',
            'note' => 'working time',
        ],
        'holiday' => [
            'heading' => 'holiday',
            'note' => 'holiday',
            'offline' => 'Long vacation/special vacation'
        ],
        'requirement' => [
            'heading' => 'requirement',
            'note' => 'requirement detail',
            'priority' => 'Welcome requirement details',
        ],
        'address' => [
            'heading' => 'address',
            'note' => 'detailed address'
        ],
        'name' => [
            'label' => 'name job',
            'search' => 'Search name job'
        ]
    ],
    'heading' => [
        'job_content' => 'Job content',
        'job_type' => 'Type job',
        'job_description' => 'Job description',
        'treatment_note' => 'Treatment note',
    ],
    'validations' => [
        'image' => ['required' => 'image is required', 'max' => 'image max is :max'],
        'title' => ['required' => 'title is required', 'max' => 'title max is :max'],
        'content' => [
            'title' => ['required' => 'title content is required', 'max' => 'title content max is :max'],
            'text' => ['required' => 'content note is required', 'max' => 'content note max is :max']
        ],
        'collection_id' => ['required' => 'collection is required', 'max' => 'collection max is :max'],
        'category_id' => ['required' => 'category is required', 'max' => 'category max is :max'],
        'description' => [
            'feature_id' => ['required' => 'feature description  is required']
        ],
        'salary' => [
            'type' => ['required' => 'salary type is required'],
            'pay' => ['required' => 'salary pay is required'],
            'min' => ['required' => 'salary min is required'],
        ],
        'working_time' => [
            'feature_id' => ['required' => 'working time feature is required'],
            'note' => ['required' => 'working time note is required'],
        ],
        'holiday' => [
            'feature_id' => ['required' => 'holiday is required'],
        ],
        'requirement' => [
            'feature_id' => ['required' => 'requirement feature is required'],
            'note' => ['required' => 'requirement note is required'],
        ],
        'process' => ['required' => 'process is required'],
    ]
];
