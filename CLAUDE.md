# CLAUDE.md - Mental Health Agentic Survey Project

## Build & Development Commands
- `composer dev` - Main dev command (runs server, queue, logs, and vite concurrently)
- `php artisan serve` - Start Laravel development server
- `npm run dev` - Start Vite for frontend assets
- `npm run build` - Build frontend assets for production

## Testing & Linting
- `./vendor/bin/phpunit` - Run all tests
- `./vendor/bin/phpunit --filter TestName` - Run specific test
- `./vendor/bin/pint` - Run Laravel Pint code style fixer

## Code Style Guidelines
- **Indentation**: 4 spaces for PHP/JS, 2 spaces for YAML
- **Naming**: PascalCase for classes, camelCase for methods/properties
- **PHP Structure**: Follow PSR-4 autoloading standards
- **Models**: Place in app/Models directory
- **Components**: Livewire components in app/Livewire directory
- **Error Handling**: Use Laravel's built-in exception handling
- **Type Hints**: Use strict type declarations where possible
- **Formatting**: Follow Laravel coding style