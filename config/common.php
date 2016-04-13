<?php

return [
    'user' => [
        'password_min_length' => 8,
        'password_max_length' => 32,
    ],
    'category' => [
        'number_min' => 1,
        'path_uploadImage' => 'uploads/category',
    ],
    'lesson' => [
        'take' => 10,
        'conditionalAll' => 3,
        'conditionalNotLearned' => 2,
        'conditionalLearned' => 1,
    ]
];
