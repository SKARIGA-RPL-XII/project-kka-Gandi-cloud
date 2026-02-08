@echo off
echo ========================================
echo   GOCLEAN - Quick Start Setup
echo ========================================
echo.

echo [1/6] Checking PHP...
php -v
if errorlevel 1 (
    echo ERROR: PHP not found! Install PHP first.
    pause
    exit
)
echo.

echo [2/6] Installing Composer dependencies...
call composer install
if errorlevel 1 (
    echo ERROR: Composer install failed!
    pause
    exit
)
echo.

echo [3/6] Setting up environment...
if not exist .env (
    copy .env.example .env
    echo .env file created
)
php artisan key:generate
echo.

echo [4/6] Setting up database...
echo Please make sure:
echo - XAMPP/MySQL is running
echo - Database 'goclean' is created
echo.
pause

echo [5/6] Running migrations and seeders...
php artisan migrate:fresh --seed
if errorlevel 1 (
    echo ERROR: Migration failed! Check database connection.
    pause
    exit
)
echo.

echo [6/6] Clearing cache...
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
echo.

echo ========================================
echo   Setup Complete!
echo ========================================
echo.
echo Admin Login:
echo   Email: admin@goclean.com
echo   Password: goclean
echo.
echo Starting server...
echo Open browser: http://localhost:8000
echo.
php artisan serve
