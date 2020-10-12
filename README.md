# ECSSR Test Platform

[Demo frontend](http://appsoluters.io/ecssr/)
Please register and login use the application

[Demo backend](http://appsoluters.io/ecssr/admin)
```sh
Email: admin@admin.com
password: admin
```

### Installation
Application requires [PHP] 7.3+ to run.

```sh
$ cd ecssr
$ composer install
$ php artisan migrate
$ php artisan seed
$ npm install && npm run dev
```

### Configuration
Change constant file url
```sh
resources/js/constant.js
BASE_URL = http://localhost/ecssr/ [if in subfolder]
API_URL = /ecssr/api/ [if in subfolder]
```
Change the .env file
Second Tab:
```sh
APP_URL=http://localhost
```
