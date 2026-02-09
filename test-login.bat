@echo off
echo ========================================
echo   TEST LOGIN & REGISTER
echo ========================================
echo.

echo [1] Checking Admin Account...
php artisan tinker --execute="echo 'Admin: '; \$admin = App\Models\User::where('email', 'admin@goclean.com')->first(); if(\$admin) { echo 'EXISTS - Email: ' . \$admin->email . ' | Role: ' . \$admin->role . PHP_EOL; } else { echo 'NOT FOUND!' . PHP_EOL; }"
echo.

echo [2] Testing Register (Customer)...
echo Creating test customer...
php artisan tinker --execute="try { \$user = App\Models\User::create(['name' => 'Test Customer', 'email' => 'testcustomer@test.com', 'password' => bcrypt('password'), 'role' => 'customer']); echo 'SUCCESS: Customer created - ' . \$user->email . PHP_EOL; } catch(Exception \$e) { echo 'Customer already exists or error' . PHP_EOL; }"
echo.

echo [3] Testing Register (Staff)...
echo Creating test staff...
php artisan tinker --execute="try { \$user = App\Models\User::create(['name' => 'Test Staff', 'email' => 'teststaff@test.com', 'password' => bcrypt('password'), 'role' => 'staff']); echo 'SUCCESS: Staff created - ' . \$user->email . PHP_EOL; } catch(Exception \$e) { echo 'Staff already exists or error' . PHP_EOL; }"
echo.

echo [4] Listing All Users...
php artisan tinker --execute="App\Models\User::all()->each(function(\$u) { echo \$u->id . ' | ' . \$u->name . ' | ' . \$u->email . ' | ' . \$u->role . PHP_EOL; });"
echo.

echo ========================================
echo   TEST COMPLETE!
echo ========================================
echo.
echo Login Credentials:
echo.
echo Admin:
echo   Email: admin@goclean.com
echo   Password: goclean
echo.
echo Customer:
echo   Email: testcustomer@test.com
echo   Password: password
echo.
echo Staff:
echo   Email: teststaff@test.com
echo   Password: password
echo.
echo Test URLs:
echo   Login: http://localhost:8000/login
echo   Register: http://localhost:8000/register
echo.
pause
