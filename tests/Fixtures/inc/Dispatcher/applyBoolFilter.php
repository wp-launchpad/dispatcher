<?php
return [
    'shouldReturnFilter' => [
        'config' => [
            'initial_value' => true,
            'value' => false,
        ],
        'expected' => false,
    ],
    'invalidShouldReturnDefault' => [
        'config' => [
            'initial_value' => true,
            'value' => 'invalid',
        ],
        'expected' => true,
    ],

];
