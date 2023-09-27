@echo off

set PATH=%PATH%;C:\Users\Administrator\Desktop\Gunny\Road\Road.Service.exe
taskkill /IM Road.Service.exe /F
start "" /b C:\Users\Administrator\Desktop\Gunny\Road\Road.Service.exe
