<?php
return [
    'shouldReturnFilter' => [
        'config' => [
            'initial_value' => 100,
            'value' => 0,
        ],
        'expected' => 0,
    ],
    'invalidShouldReturnDefault' => [
        'config' => [
            'initial_value' => 100,
            'value' => ['invalid'],
        ],
        'expected' => 1,
    ],

];
