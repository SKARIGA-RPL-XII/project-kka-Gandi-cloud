@echo off
echo ========================================
echo   GOCLEAN - Complete System Fix
echo ========================================
echo.

echo [1/8] Clearing all caches...
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
echo Cache cleared!
echo.

echo [2/8] Optimizing application...
php artisan optimize
echo.

echo [3/8] Checking database connection...
php artisan db:show
echo.

echo [4/8] Running migrations...
php artisan migrate --force
echo.

echo [5/8] Seeding admin account...
php artisan db:seed --class=AdminSeeder --force
echo.

echo [6/8] Creating storage link...
php artisan storage:link
echo.

echo [7/8] Setting permissions...
echo Setting storage permissions...
echo.

echo [8/8] Testing routes...
php artisan route:list --path=customer
php artisan route:list --path=staff
php artisan route:list --path=admin
echo.

echo ========================================
echo   System Fix Complete!
echo ========================================
echo.
echo All functions should now work properly.
echo.
echo Test URLs:
echo - Login: http://localhost:8000/login
echo - Register: http://localhost:8000/register
echo - Customer: http://localhost:8000/customer/test
echo - Staff: http://localhost:8000/staff/test
echo - Admin: http://localhost:8000/admin/test
echo.
pause
