#---------------------------------------------------------------------------
#setPath: 
#---------------------------------------------------------------------------

export SYMBOL=$1
export SOURCE_DATA_PATH=../temp
export TARGET_DATA_PATH=../temp
export DB_PATH=../db
export DATABASE=%DB_PATH%/eqm.db 

#----------------------------------------------------------------------------
#Load the data 
#----------------------------------------------------------------------------
sqlite3 $DATABASE < load-data-master.sql
