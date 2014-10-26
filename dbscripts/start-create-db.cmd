@REM ---------------------------------------------------------------------------
@REM setPath: 
@REM ---------------------------------------------------------------------------

SET DB_PATH=..\db
SET DATABASE=%DB_PATH%\eqm.db 

@REM ---------------------------------------------------------------------------
@REM clean: 
@REM ---------------------------------------------------------------------------
@REM Not cleaning anything now

@REM ----------------------------------------------------------------------------
@REM Load the data model 
@REM ----------------------------------------------------------------------------
sqlite3 %DATABASE% < create_tables_annual_reports.sql
sqlite3 %DATABASE% < create_tables_EQM.sql
sqlite3 %DATABASE% < create_tables_master_data.sql
sqlite3 %DATABASE% < create_tables_portfolio.sql
sqlite3 %DATABASE% < create_views.sql
