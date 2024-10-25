<?php
return [
    'shouldReturnFilter' => [
        'config' => [
            'initial_value' => 100.0,
            'value' => 0.0,
        ],
        'expected' => 0.0,
    ],
    'invalidShouldReturnDefault' => [
        'config' => [
            'initial_value' => 100.0,
            'value' => 'invalid',
        ],
        'expected' => 0.0,
    ],
];
