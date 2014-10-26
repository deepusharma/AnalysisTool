#---------------------------------------------------------------------------
#setPath: 
#---------------------------------------------------------------------------

export DB_PATH=../db
export DATABASE=$DB_PATH\eqm.db 

#---------------------------------------------------------------------------
#clean: 
#---------------------------------------------------------------------------
#Not cleaning anything now

#----------------------------------------------------------------------------
#Load the data model 
#----------------------------------------------------------------------------
sqlite3 $DATABASE < create_tables_annual_reports.sql
sqlite3 $DATABASE < create_tables_EQM.sql
sqlite3 $DATABASE < create_tables_master_data.sql
sqlite3 $DATABASE < create_tables_portfolio.sql
sqlite3 $DATABASE < create_views.sql
