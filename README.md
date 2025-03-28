# Laravel SafeName

A Laravel validation package to prevent the use of reserved words in usernames or other fields.

## Support for Ukraine and Call for Solidarity 🇺🇦

Québec Studio supports Ukraine and its people in their quest for peace, freedom, and sovereignty.

If you do not support the Ukrainian people in this unjust war they never wanted, we kindly ask you not to use our software, as it is intended for those who wish to be on the right side of history.

## Features

- Exact word matching (e.g., `admin` would block only `admin`)
- Partial word matching (e.g., `admin` would block `administrator`, `superadmin`, etc.)
- Multilingual support (English and French included)
- Configurable reserved word lists
- Support for Laravel 11.x

## Installation

```bash
composer require quebecstudio/safename
```

## Configuration

Publish the config and translation files:

```bash
php artisan vendor:publish --tag="safename"
```

### Reserved Words Configuration

Edit `config/safename.php` to customize your reserved words:

```php
return [
    'exact' => [
        'admin',
        'root',
        // ...
    ],
    'partial' => [
        'admin',    // Will block 'administrator', 'superadmin', etc.
        'super',    // Will block 'superuser', 'superman', etc.
        // ...
    ]
];
```

## Usage

### Using the Rule Object

```php
use Quebecstudio\SafeName\Rules\SafeName;

$request->validate([
    'username' => ['required', new SafeName()]
]);
```

### Using the Rule String

```php
$request->validate([
    'username' => 'required|safe_name'
]);
```

### Command Line Validation

The package includes an artisan command to test usernames:

```bash
php artisan validate:username
```

## Translations

The package includes English and French translations. You can override them by publishing the language files and editing them in `lang/vendor/safename/`.

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
