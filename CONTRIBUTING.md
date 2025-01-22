# Contributing to Laravel SafeName

## Pull Requests

- Fork the repository
- Create a new branch for your feature (`git checkout -b feature/amazing-feature`)
- Commit your changes (`git commit -m 'Add some amazing feature'`)
- Push to the branch (`git push origin feature/amazing-feature`)
- Open a Pull Request

## Development setup

```bash
composer install
```

## Testing

```bash
composer test
```

## Coding Standards

This package follows PSR-12 coding standards. Run:

```bash
composer pint
```

## Adding Translations

1. Add new language folder in `resources/lang/{locale}`
2. Copy content from existing language files
3. Translate the messages
4. Add tests for the new translations

## Versioning

We use [SemVer](http://semver.org/) for versioning.

## Security

If you discover any security related issues, please email rtrudel@quebec.studio instead of using the issue tracker.
