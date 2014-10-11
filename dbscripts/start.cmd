@REM ----------------------------------------------------------------------------
@REM SET the unix utils in the path and save the old path to revert at end of 
@REM program
@REM ----------------------------------------------------------------------------

SET OLD_PATH=%PATH%
SET PATH=../UnxUtils/bin;%PATH%;

SET SYMBOL=%1

@REM ----------------------------------------------------------------------------
@REM Call the Script:
@REM ----------------------------------------------------------------------------

REM sh.exe start.sh %SYMBOL%

sh.exe start.sh %SYMBOL%

echo "Symbol is %SYMBOL%"

@REM ----------------------------------------------------------------------------
@REM Revert Back the Paths:
@REM ----------------------------------------------------------------------------

@REM SET PATH=%OLD_PATH%