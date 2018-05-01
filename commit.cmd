rem Get around to working on this eventually

rem @echo off
echo Starting to commit

set /P message="Commit message: "
set /P password="Password: "

echo %message%
echo %password%

git add .

git commit -m %message%

if errorlevel 1 (
    echo "Commit Fail"
    goto :fail
)

git push

if errorlevel 1 (
    echo "Push Fail"
    goto :fail
)

echo "Git Done"
pause


:fail
echo "Git Error"
pause