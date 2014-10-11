@REM ---------------------------------------------------------------------------
@REM setPath: 
@REM ---------------------------------------------------------------------------

SET SYMBOL=%1
SET SOURCE_DATA_PATH=..\temp
SET TARGET_DATA_PATH=..\temp
SET DB_PATH=..\db
SET DATABASE=%DB_PATH%\eqm1.db 

@REM ---------------------------------------------------------------------------
@REM clean: 
@REM ---------------------------------------------------------------------------

DEL %TARGET_DATA_PATH%\data_PH; 
DEL %TARGET_DATA_PATH%\data_ES; 
DEL %TARGET_DATA_PATH%\data_BS; 
DEL %TARGET_DATA_PATH%\data_ID; 
DEL %TARGET_DATA_PATH%\data_CF; 
DEL %TARGET_DATA_PATH%\data_SP;

@REM ---------------------------------------------------------------------------
@REM stageData: 
@REM ---------------------------------------------------------------------------

COPY %SOURCE_DATA_PATH%\data_%SYMBOL%_PH %TARGET_DATA_PATH%\data_PH;
COPY %SOURCE_DATA_PATH%\data_%SYMBOL%_ES %TARGET_DATA_PATH%\data_ES;
COPY %SOURCE_DATA_PATH%\data_%SYMBOL%_BS %TARGET_DATA_PATH%\data_BS;
COPY %SOURCE_DATA_PATH%\data_%SYMBOL%_ID %TARGET_DATA_PATH%\data_ID;
COPY %SOURCE_DATA_PATH%\data_%SYMBOL%_CF %TARGET_DATA_PATH%\data_CF;
COPY %SOURCE_DATA_PATH%\data_%SYMBOL%_SP %TARGET_DATA_PATH%\data_SP;

@REM ----------------------------------------------------------------------------
@REM Load the data model 
@REM ----------------------------------------------------------------------------
sqlite3 %DATABASE% < create_tables_annual_reports.sql
sqlite3 %DATABASE% < create_tables_EQM.sql
sqlite3 %DATABASE% < create_tables_master_data.sql
sqlite3 %DATABASE% < create_tables_portfolio.sql
sqlite3 %DATABASE% < create_views.sql


@REM ----------------------------------------------------------------------------
@REM Load the data 
@REM ----------------------------------------------------------------------------
sqlite3 %DATABASE% < loaddata.sql
