
```
Step 1: Install the package via composer

composer require brsoftsolatul/time-attendance

```
Step 2: Publish the package
```bash
php artisan vendor:publish --provider="brsoftsolatul\TimeAttendance\TimeAttendanceServiceProvider"

```
Step 3: Run the migration
```bash
php artisan migrate

```
Step 4: Add the following code to your User model
```php

use brsoftsolatul\TimeAttendance\TimeAttendance;

public function timeAttendance()
{
    return $this->hasMany(TimeAttendance::class);
}

```



