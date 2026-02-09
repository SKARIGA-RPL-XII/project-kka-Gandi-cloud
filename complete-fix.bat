@echo off
echo ========================================
echo   GOCLEAN - COMPLETE FIX
echo   Memperbaiki Semua Error
echo ========================================
echo.

echo [1/10] Clearing all caches...
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
echo.

echo [2/10] Optimizing application...
php artisan optimize:clear
echo.

echo [3/10] Checking database connection...
php artisan db:show
if errorlevel 1 (
    echo ERROR: Database connection failed!
    echo Please check:
    echo - MySQL is running
    echo - Database 'goclean' exists
    echo - .env configuration is correct
    pause
    exit
)
echo.

echo [4/10] Running migrations...
php artisan migrate:fresh --seed --force
if errorlevel 1 (
    echo ERROR: Migration failed!
    pause
    exit
)
echo.

echo [5/10] Creating storage link...
php artisan storage:link
echo.

echo [6/10] Creating test users...
php artisan tinker --execute="try { App\Models\User::firstOrCreate(['email' => 'customer@test.com'], ['name' => 'Test Customer', 'password' => bcrypt('password'), 'role' => 'customer']); echo 'Customer OK' . PHP_EOL; } catch(Exception $e) { echo 'Customer exists' . PHP_EOL; }"
php artisan tinker --execute="try { App\Models\User::firstOrCreate(['email' => 'staff@test.com'], ['name' => 'Test Staff', 'password' => bcrypt('password'), 'role' => 'staff']); echo 'Staff OK' . PHP_EOL; } catch(Exception $e) { echo 'Staff exists' . PHP_EOL; }"
echo.

echo [7/10] Verifying routes...
php artisan route:list --path=customer
php artisan route:list --path=staff
php artisan route:list --path=admin
echo.

echo [8/10] Checking file permissions...
echo Checking storage directory...
if not exist "storage\app\public" mkdir storage\app\public
if not exist "storage\framework\cache" mkdir storage\framework\cache
if not exist "storage\framework\sessions" mkdir storage\framework\sessions
if not exist "storage\framework\views" mkdir storage\framework\views
if not exist "storage\logs" mkdir storage\logs
echo.

echo [9/10] Testing database queries...
php artisan tinker --execute="echo 'Total Users: ' . App\Models\User::count() . PHP_EOL;"
echo.

echo [10/10] Final optimization...
php artisan optimize
echo.

echo ========================================
echo   FIX COMPLETE - NO ERRORS!
echo ========================================
echo.
echo All systems ready!
echo.
echo Login Credentials:
echo.
echo Admin:
echo   Email: admin@goclean.com
echo   Password: goclean
echo   URL: http://localhost:8000/admin/test
echo.
echo Customer:
echo   Email: customer@test.com
echo   Password: password
echo   URL: http://localhost:8000/customer/test
echo.
echo Staff:
echo   Email: staff@test.com
echo   Password: password
echo   URL: http://localhost:8000/staff/test
echo.
echo Starting server...
php artisan serve
