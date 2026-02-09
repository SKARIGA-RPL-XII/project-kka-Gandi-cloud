@echo off
echo ========================================
echo   CLEANUP - Hapus File Tidak Perlu
echo ========================================
echo.

echo [1] Menghapus file cache...
if exist "bootstrap\cache\*.php" del /q bootstrap\cache\*.php
echo Cache files deleted
echo.

echo [2] Menghapus compiled views...
if exist "storage\framework\views\*.php" del /q storage\framework\views\*.php
echo Compiled views deleted
echo.

echo [3] Menghapus session files...
if exist "storage\framework\sessions\*" del /q storage\framework\sessions\*
echo Session files deleted
echo.

echo [4] Menghapus log files lama...
if exist "storage\logs\*.log" (
    for /f "skip=1" %%f in ('dir /b /o-d storage\logs\*.log') do del "storage\logs\%%f"
)
echo Old logs deleted
echo.

echo [5] Menghapus node_modules (jika tidak dipakai)...
echo Skipping node_modules (uncomment if needed)
REM if exist "node_modules" rmdir /s /q node_modules
echo.

echo [6] Menghapus vendor test files...
if exist "vendor\bin\*.bat" del /q vendor\bin\*.bat
echo Vendor test files deleted
echo.

echo [7] Menghapus file backup...
if exist "*.bak" del /q *.bak
if exist "*.old" del /q *.old
if exist "*.tmp" del /q *.tmp
echo Backup files deleted
echo.

echo [8] Menghapus duplicate migrations...
REM Already cleaned
echo Duplicate migrations already removed
echo.

echo [9] Cleaning up...
php artisan cache:clear
php artisan view:clear
echo.

echo ========================================
echo   CLEANUP COMPLETE!
echo ========================================
echo.
echo Files removed:
echo - Cache files
echo - Compiled views
echo - Old sessions
echo - Old logs
echo - Backup files
echo.
echo Website size optimized!
echo.
pause
