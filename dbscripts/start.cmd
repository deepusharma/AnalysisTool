@REM ----------------------------------------------------------------------------
@REM Load the data model
@REM ----------------------------------------------------------------------------
sqlite3 ../db/eqm.db < create_tables_master_data.sql

sqlite3 ../db/eqm.db < create_tables_annual_reports.sql

sqlite3 ../db/eqm.db < create_tables_portfolio.sql

sqlite3 ../db/eqm.db < create_tables_EQM.sql

sqlite3 ../db/eqm.db < create_views.sql


@REM ----------------------------------------------------------------------------
@REM Load the Temporary Data:
@REM ----------------------------------------------------------------------------

sqlite3 ../db/eqm.db < loaddata.sql
