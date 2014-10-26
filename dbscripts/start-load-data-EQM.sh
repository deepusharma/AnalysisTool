#---------------------------------------------------------------------------
#setPath: 
#---------------------------------------------------------------------------

export SYMBOL=$1
export SOURCE_DATA_PATH=../temp
export TARGET_DATA_PATH=../temp
export DB_PATH=../db
export DATABASE=$DB_PATH/eqm.db 

#---------------------------------------------------------------------------
#clean: 
#---------------------------------------------------------------------------

rm $TARGET_DATA_PATH/data_PH; 
rm $TARGET_DATA_PATH/data_ES; 
rm $TARGET_DATA_PATH/data_BS; 
rm $TARGET_DATA_PATH/data_ID; 
rm $TARGET_DATA_PATH/data_CF; 
rm $TARGET_DATA_PATH/data_SP;

#---------------------------------------------------------------------------
#stageData: 
#---------------------------------------------------------------------------

COPY $SOURCE_DATA_PATH/data_$SYMBOL_PH $TARGET_DATA_PATH/data_PH;
COPY $SOURCE_DATA_PATH/data_$SYMBOL_ES $TARGET_DATA_PATH/data_ES;
COPY $SOURCE_DATA_PATH/data_$SYMBOL_BS $TARGET_DATA_PATH/data_BS;
COPY $SOURCE_DATA_PATH/data_$SYMBOL_ID $TARGET_DATA_PATH/data_ID;
COPY $SOURCE_DATA_PATH/data_$SYMBOL_CF $TARGET_DATA_PATH/data_CF;
COPY $SOURCE_DATA_PATH/data_$SYMBOL_SP $TARGET_DATA_PATH/data_SP;

#----------------------------------------------------------------------------
#Load the data 
#----------------------------------------------------------------------------
sqlite3 $DATABASE < load-data-EQM.sql
