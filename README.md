# smita-karoseri
An Aplication Build with Laravel and AdminLTE, please read Configuration section first.
## Configuration
### Step 1. Clone and Install
After Clone or download this project, in your cli run command `composer install`
### Step 2. Get .env file
Don't forget to add your `.env` file, you can copy from your another laravel project. or you can just use command 'php -r "copy('.env.example', '.env');"'.
### Step 3. Setup database
Setup your database as mentioned in '.env'. if database in '.env' not exist, create before run a migrate.
### Step 4. Generate Key
Run Command 'php artisan key:generate'
### Step 5. Run migrate
After that run migrate with command `php artisan migrate`
### Step 6. Project Ready!
Project is Ready!, you can serve with command `php artisan serve`
## Contribute
To do custom go to folder config and open adminlte.php
### Menu
at adminlte.php file search for 
<pre>
'menu' => [
        'MAIN NAVIGATION',
        [
            text' => 'Blog',
            'url'  => 'admin/blog',
            .....................
            ..............
            ...............
            'text'       => 'Information',
            'icon_color' => 'aqua',
        ],
    ],
</pre>
Feel free to add/delete/edit on that section to make your own Menu

