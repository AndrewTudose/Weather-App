# Laravel Weather Application


## Used Soft

- php 8.2
- Laravel framework
- JavaScript
- Ajax
- MySql 5.7
- jQuery
- Fillamnentphp

## Setup Application

1. download locally source code

2. run composer update
```bash
php composer.phar update
```
3. add necessary tables and db to work
```bash
php artisan migrate
```

4. seed db with default user
   - login - *test@example.com*
   - password -  *adminadmin*
```bash
php artisan db:seed
```

5. add in crontab script to run sceduled commands
```bash
* * * * * cd /path/to/local/directory && php artisan schedule:run >> /dev/null 2>&1
```

6. run command to test functionality
```bash
php artisan serve
```

**Scheduled Script Path:**

/app/Console/Commands/AddWeatherInformation.php

