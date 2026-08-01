# Sewer Inspection Tracker

A Laravel application for tracking sewer inspection work — customers, projects,
assets and the pipes within them, and the inspections, cleanings and installations
carried out against them.

## Domain

| model | |
| --- | --- |
| `Customer`, `Address`, `Project`, `ProjectType` | who the work is for and where |
| `Asset`, `AssetType`, `Pipe`, `PipeTurn` | what is being worked on |
| `Inspection`, `Cleaning`, `Installation` | what was done to it |
| `User` | who did it |

## Running it

Standard Laravel. PHP 8.2 or later.

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```

Tests: `php artisan test`.

## Contributing and security

Both go through this repository — open an issue or a pull request. Report a security
problem privately rather than in a public issue.

This is **not** the place to report anything about Laravel itself. Laravel's own
contribution guide, code of conduct and security contact live in the
[Laravel documentation](https://laravel.com/docs/contributions).

## License

Copyright (C) 2026 Tyler Vigario

This program is free software: you can redistribute it and/or modify it under the
terms of the GNU Affero General Public License as published by the Free Software
Foundation, either **version 3 of the License, or (at your option) any later
version**.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE. See the [GNU Affero General Public License](LICENSE) for more
details.

The Laravel framework this is built on remains
[MIT](https://opensource.org/licenses/MIT), and that is unaffected — MIT-licensed
components may be combined into an AGPL work while keeping their own terms.
