<?php
return [


    /*
    |--------------------------------------------------------------------------
    | Fallback ON / OFF
    |--------------------------------------------------------------------------
    |
    |
    | Enable / disable the redis driver fallback to test if it is working.
    |
    | The Redis driver fallback only works if the selected cache driver is set to redis,
    | otherwise even if this option is set to on, only the default laravel cache manager
    | will works.
    |
    */

    'fallback_turn_on' => true,

    /*
    |--------------------------------------------------------------------------
    | Cache Driver Fallback
    |--------------------------------------------------------------------------
    |
    | This option controls the fallback cachedriver that temporarily replaces the redis cache.
    |
    | Supported: "apc", "array", "database", "file",
    |            "memcached", "dynamodb"
    |
    */

    'fallback_driver' => 'file',

    /*
    |--------------------------------------------------------------------------
    | Synchronization mode
    |--------------------------------------------------------------------------
    |
    | Here it is possible to define the synchronization mode: when the redis server stops,
    | cache of the new driver selected is cleared in order to remain updated.
    | When the redis returns, the redis cache is cleared before running again.
    | This way, you don't run the risk of downloading not updated data from the cache.
    |
    | Set true, to activate the synchronization mode.
    */

    'sync_mode' => false,

    /*
    |--------------------------------------------------------------------------
    | Alert email
    |--------------------------------------------------------------------------
    |
    | You have the option to send yourself an email with a default text,
    | whenever the redis server should fall.
    |
    | In case of problems with the mail service, it is possible to catch the error
    | without interrupting the entire cache request. Set "catch_error" to true, so a
    | log error will be saved in "app/storage/app/redis/mails_error.log" with more
    | details. If you set this option to false, laravel will force to send e-mails
    | and an error exception will interrupt the request with an error exception page.
    | It is recommended to leave this option on false, in development mode.
    |
    | It is recomended that you use the event ('redis.unvailable') which is fired
    | whenever the redis stops working, to send the email through your controller
    | and using your laravel queues.
    */

    'email_config' => [
        'send_email' => false,
        'to' => 'email@email.com',
        'catch_error' => false,
    ]

];