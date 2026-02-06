@echo off
echo Cleaning up old git...
if exist .git rmdir /s /q .git
echo Initializing new git repository...
git init
git add .
git commit -m "Backup before UI updates"
git branch -M main
git remote add origin https://github.com/AshleyImmanuel/lava.git
echo Pushing to remote...
git push -u origin main --force
echo Backup complete.
