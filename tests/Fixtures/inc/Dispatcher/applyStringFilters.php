<?php
return [
    'shouldReturnFilter' => [
        'config' => [
            'initial_value' => 'initial',
            'value' => 'value',
        ],
        'expected' => 'value',
    ],
    'invalidShouldReturnDefault' => [
        'config' => [
            'initial_value' => 'initial',
            'value' => ['invalid'],
        ],
        'expected' => 'initial',
    ],

];
