# ----------------------------------------------------------------------------
# Load the data model
# ----------------------------------------------------------------------------
sqlite3 ../db/eqm.db < create_tables_master_data.sql

sqlite3 ../db/eqm.db < create_tables_portfolio.sql

sqlite3 ../db/eqm.db < create_tables_EQM.sql

sqlite3 ../db/eqm.db < create_tables_annual_reports.sql

sqlite3 ../db/eqm.db < create_views.sql


# ----------------------------------------------------------------------------
# Load the Temporary Data:
# ----------------------------------------------------------------------------

sqlite3 ../db/eqm.db < loaddata.sql
