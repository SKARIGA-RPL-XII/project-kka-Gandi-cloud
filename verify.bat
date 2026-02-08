@echo off
echo ========================================
echo   GOCLEAN - System Verification
echo ========================================
echo.

echo Checking system requirements...
echo.

echo [1] PHP Version:
php -v | findstr "PHP"
echo.

echo [2] Composer Version:
composer --version
echo.

echo [3] Laravel Version:
php artisan --version
echo.

echo [4] Database Connection:
php artisan db:show
echo.

echo [5] Routes List:
echo.
echo === Customer Routes ===
php artisan route:list --path=customer
echo.
echo === Staff Routes ===
php artisan route:list --path=staff
echo.
echo === Admin Routes ===
php artisan route:list --path=admin
echo.

echo [6] Checking Migrations:
php artisan migrate:status
echo.

echo [7] Testing Database:
php artisan tinker --execute="echo 'Users: ' . App\Models\User::count();"
echo.

echo ========================================
echo   Verification Complete!
echo ========================================
echo.
echo If all checks passed, system is ready!
echo.
echo Quick Test URLs:
echo - Login: http://localhost:8000/login
echo - Customer: http://localhost:8000/customer/test
echo - Staff: http://localhost:8000/staff/test
echo - Admin: http://localhost:8000/admin/test
echo.
pause
