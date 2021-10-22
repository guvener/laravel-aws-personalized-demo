<?php

return [

    // App\Actions\Personalize/PersonalizeViewer needs following configurations filled to make AWS Personalize Requests
    'campaign_arn' => env('CAMPAIGN_ARN'),
    'aws_key' => env('AWS_ACCESS_KEY_ID'),
    'aws_secret' => env('AWS_SECRET_ACCESS_KEY'),
    'aws_region' => env('AWS_DEFAULT_REGION'),

    // App\Models\Link needs Open Movie Database API key filled to get movie metadata
    'omdb_key' => env('OMDB_KEY')
];
