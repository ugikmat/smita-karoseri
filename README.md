# smita-karoseri
An Aplication Build with Laravel and AdminLTE, please read Configuration section first.
## Configuration
After Clone or download this project, in your cli run command `composer install`
<br>
Don't forget to add your `.env` file, you can copy from your another laravel project.
<br>
After that run migrate with command `php artisan migrate`
<br>
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

