# YTC Dev test

This project is for a job enterview of Paulo José using Laravel 8 and Vue JS Components

## Installation instructions

Clone this package to your local machine

```bash
git clone https://github.com/paulocentr/ytcdevtest
```

Install composer dependencies

```bash
composer install
```

Install NPM dependencies

```bash
npm i --save
```

Create a database named blast and copy the file
```bash
.env.example
```
to

```bash
.env
```

After installing dependencies run the migrations and the seeder
```bash
php artisan migrate:fresh --seed
```

This will create a user called Admin and the credentials are
```bash
email: admin@site.com
password: 123456
```

