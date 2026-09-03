@echo off
cd /d "C:\inetpub\wwwroot\DocFlow"
php artisan queue:work --tries=3 --sleep=3 --stop-when-empty