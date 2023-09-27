@echo off

set PATH=%PATH%;C:\Users\Administrator\Desktop\Gunny\Fight\Fighting.Service.exe
taskkill /IM Fighting.Service.exe /F
start "" /b C:\Users\Administrator\Desktop\Gunny\Fight\Fighting.Service.exe
