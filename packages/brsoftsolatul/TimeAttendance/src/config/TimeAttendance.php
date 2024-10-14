<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Time Attendance Settings
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default settings for your time attendance package.
    | You can adjust these settings as necessary to fit your application's needs.
    |
    */

    'auto_punch_out' => env('TIME_ATTENDANCE_AUTO_PUNCH_OUT', false),

    /*
    |--------------------------------------------------------------------------
    | Time Format
    |--------------------------------------------------------------------------
    |
    | This option defines the format in which the time will be stored in the
    | database. You can use any PHP date format, such as 'Y-m-d H:i:s'.
    |
    */

    'time_format' => env('TIME_ATTENDANCE_TIME_FORMAT', 'Y-m-d H:i:s'),

    /*
    |--------------------------------------------------------------------------
    | Timezone Settings
    |--------------------------------------------------------------------------
    |
    | Here you can define the default timezone for time entries.
    | You can either use the default timezone set in Laravel or override it.
    |
    */

    'timezone' => env('TIME_ATTENDANCE_TIMEZONE', config('app.timezone', 'ASIA/KOLKATA')),

    /*
    |--------------------------------------------------------------------------
    | Maximum Working Hours
    |--------------------------------------------------------------------------
    |
    | This option defines the maximum number of hours an employee can work
    | before they are automatically logged out (if auto_punch_out is enabled).
    |
    */

    'max_working_hours' => env('TIME_ATTENDANCE_MAX_WORKING_HOURS', 8),

    /*
    |--------------------------------------------------------------------------
    | Break Time Duration
    |--------------------------------------------------------------------------
    |
    | This option defines the allowed break time in minutes for employees.
    | The system will ensure breaks are calculated appropriately.
    |
    */

    'break_duration' => env('TIME_ATTENDANCE_BREAK_DURATION', 60),

    /*
    |--------------------------------------------------------------------------
    | Performance Check Threshold
    |--------------------------------------------------------------------------
    |
    | If the task time exceeds this threshold (in hours), the performance
    | will be flagged.
    |
    */

    'performance_check_threshold' => env('TIME_ATTENDANCE_PERFORMANCE_THRESHOLD', 10),

];
