<?php
return [
    'shouldReturnFilter' => [
        'config' => [
            'initial_value' => 'initial_value',
            'value' => 'value',
        ],
        'expected' => 0,
    ],
    'invalidShouldReturnDefault' => [
        'config' => [
            'initial_value' => 'initial_value',
            'value' => 'invalid',
        ],
        'expected' => 'initial_value',
    ],
];
