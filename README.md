# Calculator
A demo symfony project.

## Development
#### Installation
To install the project dependencies, run:
```
composer install
```

#### Running the Application
To start the Symfony server for local development, run:
```
symfony server:start
```
### Coding Standards
PSR-2 is used along with PHP-CS-Fixer. To check and fix coding standards, run:
```
vendor/bin/php-cs-fixer fix
```
To check coding standards without fixing, run:
```
vendor/bin/php-cs-fixer fix --dry-run --diff
```
### Testing
PHPUnit is used for unit testing. To run the tests, use:
```
vendor/bin/phpunit
```

### Static Analysis
PHPStan is used for static analysis. To run PHPStan, use:
```
vendor/bin/phpstan analyse
```

