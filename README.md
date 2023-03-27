# laravel-examination
Laravel Examination - Mini CRM

Clone Repository
`git clone https://github.com/melbulan/laravel-examination.git`

Run composer install

`composer install`

Run npm install

`npm install`

Create a copy of `.env.example` run

`cp .env.example .env`

Configure your `.env` to use your local database

For google maps api key change the value of this config below

`GOOGLE_MAPS_GEOCODING_API_KEY=your_google_api_key`

Run migration and seeder

`php artisan migrate --seed`

Start local server

`php artisan serve`

Open another terminal run `npm run dev`
