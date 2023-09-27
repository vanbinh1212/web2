@echo off

set PATH=%PATH%;C:\Users\Administrator\Desktop\Gunny\Center\Center.Service.exe
taskkill /IM Center.Service.exe /F
start "" /b C:\Users\Administrator\Desktop\Gunny\Center\Center.Service.exe
