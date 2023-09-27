@if (@CodeSection == @Batch) @then


@echo off

set SendKeys=CScript //nologo //E:JScript "%~F0"

start DDT_Bomb_Convert.exe /B cmd

set /P "=Wait and send a Tab command: " < NUL
ping -n 3 -w 1 gunnyae.com > NUL
%SendKeys% "{TAB}"


set /P "=Wait and send an Enter key:" < NUL
ping -n 1 -w 1 gunnyae.com > NUL
%SendKeys% "{ENTER}"

goto :EOF

@end

var WshShell = WScript.CreateObject("WScript.Shell");
WshShell.SendKeys(WScript.Arguments(0));