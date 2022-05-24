## About Laravel

### Чистый запуск
```
{%project_folder%}: cp ./env.example ./.env
{%project_folder%}: ./vendor/bin/sail up -d
{%project_folder%}: alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
{%project_folder%}: artisan migrate --seed
```

### Для локального запуска
```
{%project_folder%}: php artisan serve
http://127.0.0.1:8000
```
### Для подтверждения email
```
{%project_folder%}: в ./env 
MAIL_MAILER=log
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
```
