<?php

return [
    'api_base' => env('VSL_DATA_CENTER_BASE_URL'),

    'api_key' => env('VSL_DATA_CENTER_KEY'),

    'origin' => env('VSL_DATA_CENTER_ORIGIN'),

    'user_agent' => env('VSL_DATA_CENTER_USER_AGENT', ''),

    'rate_limit_key' => env('VSL_DATA_CENTER_RATE_LIMIT_KEY', 'datacenter-api-limit'),
];
