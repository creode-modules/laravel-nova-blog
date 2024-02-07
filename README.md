# Laravel Nova Blog
Simple Laravel Nova module which allows you to manage a blog within your Laravel application.

## Installation
Installation for this package is simple, just require the package via composer:

```bash
composer require creode/laravel-nova-blog
```

## Usage

### Migrations
Once installed, you will need to run the migrations to create the required database tables:

```bash
php artisan migrate
```

### Configuration
You will also need to publish the config file to set up the required settings:

```bash
php artisan vendor:publish --tag="nova-blog-config"
```

This will create a `config/nova-blog.php` file which you can use to configure the package.

### Publishing Views
You can also publish the views to customise the look and feel of the blog:

```bash
php artisan vendor:publish --tag="nova-blog-views"
```

This will create a `resources/views/vendor/nova-blog` directory which you can use to customise the views.

### Customising the Blog Model
The default Blog model can be replaced to allow you to add new features to it within your main application. This can easily be done by changing the model in the `config/nova-blog.php` file:

```php
// config/nova-blog.php
return [
    ...
    'post_model' => App\NovaBlog::class,
    ...
];
```

### Registering Routes
This application exposes a route which will show a simple published blog on the frontend of the website. In order to use this, you will need to register the RouteServiceProvider within your `config/app.php` file:

```php
// config/app.php
'providers' => [
    ...
    Creode\LaravelNovaBlog\Providers\RouteServiceProvider::class,
    ...
],
```

### Querying Blogs
You can make queries on blogs by using the Repository class:

```php
use Creode\LaravelNovaBlog\Repositories\BlogRepository;

$blogRepository = new BlogRepository();
$blogs = $blogRepository->all();
```

### Seeding Blog Posts
You can seed the blog posts using the `BlogDatabaseSeeder` class:

```bash
php artisan db:seed --class="Creode\LaravelNovaBlog\Database\Seeders\BlogDatabaseSeeder"
```
