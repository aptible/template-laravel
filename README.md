<br>
<img src="https://user-images.githubusercontent.com/4295811/226700092-ffbd0c01-dba1-4880-8b77-a4d26e6228f0.svg"  width="64">

# Laravel on Aptible

This is a barebones [Laravel](https://laravel.com/) example deployed on [Aptible](https://aptible.com). The app in this repo is deployed at [https://app-52756.on-aptible.com/](https://app-52756.on-aptible.com/).

[Deploy on Aptible](https://app.aptible.com/create)

## Configuration

The only thing the user needs to do is create and set `APP_KEY` environment
variable during onboarding flow.

```bash
php artisan key:generate --show
```

If you already created the app and just want to apply an environment variable,
you can use our [cli tool](https://www.aptible.com/docs/cli):

```bash
aptible config:set --app "$APP_HANDLE" APP_KEY="xxx"
```
