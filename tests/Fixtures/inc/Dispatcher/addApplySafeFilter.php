<?php

return [
    'BoolSameTypeShouldReturnOutput' => [
        'configs' => [
            'initial_value' => true,
            'value' => false,
        ],
        'expected' => false
    ],
    'BoolDifferentTypeShouldReturnOutput' => [
        'configs' => [
            'initial_value' => true,
            'value' => '10',
        ],
        'expected' => true
    ],
    'IntSameTypeShouldReturnOutput' => [
        'configs' => [
            'initial_value' => 10,
            'value' => 12,
        ],
        'expected' => 12
    ],
    'IntDifferentTypeShouldReturnOutput' => [
        'configs' => [
            'initial_value' => 10,
            'value' => '10',
        ],
        'expected' => 10
    ],
];