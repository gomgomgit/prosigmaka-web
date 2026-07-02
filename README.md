# ProWeb

Laravel Filament CMS for the ProSigmaka landing page.

## Local Setup

This project was scaffolded manually because PHP and NPM were not available in the initial shell. After installing PHP 8.3+, Composer, Node/NPM, PostgreSQL, and the PHP extensions required by Laravel/Filament:

```bash
sudo apt-get update
sudo apt-get install php8.5-curl php8.5-intl php8.5-xml php8.5-zip
```

```bash
cd proweb
composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
php artisan make:filament-user
npm install
npm run build
php artisan serve
```

Open `/admin` to manage landing section ordering and blog posts.

## Notes

- The original `../prosigmaka.com` folder is read-only reference material and should not be edited.
- Static assets are copied into `public/assets/prosigmaka`.
- Landing sections are rendered from the `landing_sections` table by `sort_order` and `is_active`.
- Blog cards show published posts only; each published post has a detail route at `/blog/{slug}`.
# prosigmaka-web
