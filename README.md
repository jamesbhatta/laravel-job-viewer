<h1 align="center">
Laravel Job Viewer
<br>
</h1>
 
This Laravel package makes it easier for you to view your jobs right from your application. It has no dependency over any other package as well as frontend framework used by your application.
 
 
## Documentation
 

### Installation
 
#### Pulling the package
Install via composer's require command:
```bash
composer require jamesbhatta/laravel-job-viewer
```
 
Install via your projects' `composer.json`:
```json
{
    . . .
    "require": {
        "php": ">=5.5.9",
        "laravel/framework": "5.1.*",
        "jamesbhatta/laravel-job-viewer": "1.0.0"
    },
    . . .
}
```
 
Once the package is in the require section you will need to run composer's `install` or `update` command to pull in the code:
```bash
# Install
composer install -o
 
# or Update
composer update -o
```
<sup>**Note**: The trailing `-o` is an optional option which is used to optimize the autoloader and is considered best practice.</sup>
 
 
#### Registering the package (Optional)
Once the package as been successfully pulled you will need to register the package's service provider to the Laravel's app and optionally add the package's facade by modifying `config/app.php`:
 
```php
...
    'providers' => [
        ...
        jamesbhatta\LaravelJobViewer\LaravelJobViewerServiceProvider::class,
 
    ],
...
```
 
 
#### Configuration
Laravel Job Viewer supports optional configuration.
 
You will need to pull the configuration in you app's configuration folder to make modifications to the default configuration.  You can achieve this with the following artisan command:
 
``` bash
php artisan vendor:publish
```
 
The configuration file will be created at `config/laravel-job-viewer.php`.
 
 
## License
Laravel Markdown is licensed under [The MIT License (MIT)](LICENSE).
