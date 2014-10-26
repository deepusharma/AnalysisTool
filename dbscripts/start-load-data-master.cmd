@REM ---------------------------------------------------------------------------
@REM setPath: 
@REM ---------------------------------------------------------------------------

SET SYMBOL=%1
SET SOURCE_DATA_PATH=..\temp
SET TARGET_DATA_PATH=..\temp
SET DB_PATH=..\db
SET DATABASE=%DB_PATH%\eqm.db 

@REM ----------------------------------------------------------------------------
@REM Load the data 
@REM ----------------------------------------------------------------------------
sqlite3 %DATABASE% < load-data-master.sql
