<?php

return [
    'config' => [
        'app_id' => env('FB_ID', null),
        'app_secret' => env('FB_SECRET', null),
        'default_graph_version' => env('FB_DEFAULT_GRAPH_VERSION', 'v2.8'),
    ],
];