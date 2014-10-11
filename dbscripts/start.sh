
# ---------------------------------------------------------------------------
# setPath: 
# ---------------------------------------------------------------------------
setPath () {
	export SYMBOL=$1
	export SOURCE_DATA_PATH=../temp
	export TARGET_DATA_PATH=../temp
	export DB_PATH=../db
	export DATABASE=$DB_PATH/eqm.db 
}


# ---------------------------------------------------------------------------
# clean: 
# ---------------------------------------------------------------------------
clean () {
 	rm -f $TARGET_DATA_PATH/data_PH $TARGET_DATA_PATH/data_ES $TARGET_DATA_PATH/data_BS $TARGET_DATA_PATH/data_ID $TARGET_DATA_PATH/data_CF $TARGET_DATA_PATH/data_SP
 	#rm -f $TARGET_DATA_PATH/data_PH; 
 	#rm -f $TARGET_DATA_PATH/data_ES; 
 	#rm -f $TARGET_DATA_PATH/data_BS; 
 	#rm -f $TARGET_DATA_PATH/data_ID; 
 	#rm -f $TARGET_DATA_PATH/data_CF; 
 	#rm -f $TARGET_DATA_PATH/data_SP;
}

# ---------------------------------------------------------------------------
# stageData: 
# ---------------------------------------------------------------------------
stageDataOld () {
	
	cp "$SOURCE_DATA_PATH/data_"$SYMBOL"_PH" $TARGET_DATA_PATH/data_PH;

	cp "$SOURCE_DATA_PATH/data_"$SYMBOL"_ES" $TARGET_DATA_PATH/data_ES;

	cp "$SOURCE_DATA_PATH/data_"$SYMBOL"_BS" $TARGET_DATA_PATH/data_BS;

	cp "$SOURCE_DATA_PATH/data_"$SYMBOL"_ID" $TARGET_DATA_PATH/data_ID;

	cp "$SOURCE_DATA_PATH/data_"$SYMBOL"_CF" $TARGET_DATA_PATH/data_CF;

#	echo "Copying 6";
	cp "$SOURCE_DATA_PATH/data_"$SYMBOL"_SP" $TARGET_DATA_PATH/data_SP;
}


# ---------------------------------------------------------------------------
# stageData: 
# ---------------------------------------------------------------------------
stageData () {
	
	SOURCE="$SOURCE_DATA_PATH/data_"$SYMBOL"_PH"
	TARGET=$TARGET_DATA_PATH/data_PH
	copyData $SOURCE $TARGET

	SOURCE="$SOURCE_DATA_PATH/data_"$SYMBOL"_ES"
	TARGET=$TARGET_DATA_PATH/data_ES
	copyData $SOURCE $TARGET

	SOURCE="$SOURCE_DATA_PATH/data_"$SYMBOL"_BS"
	TARGET=$TARGET_DATA_PATH/data_BS
	copyData $SOURCE $TARGET

	SOURCE="$SOURCE_DATA_PATH/data_"$SYMBOL"_ID"
	TARGET=$TARGET_DATA_PATH/data_ID
	copyData $SOURCE $TARGET

	SOURCE="$SOURCE_DATA_PATH/data_"$SYMBOL"_CF"
	TARGET=$TARGET_DATA_PATH/data_CF
	copyData $SOURCE $TARGET

	SOURCE="$SOURCE_DATA_PATH/data_"$SYMBOL"_SP"
	TARGET=$TARGET_DATA_PATH/data_SP
	copyData $SOURCE $TARGET
}


# ----------------------------------------------------------------------------
# Load the data model and data
# ----------------------------------------------------------------------------
copyData () {
	export SOURCE=$1
	export TARGET=$2
	cp $SOURCE $TARGET
}


# ----------------------------------------------------------------------------
# Load the data model and data
# ----------------------------------------------------------------------------
loadData () {
	echo "loading the data"
	sqlite3 $DATABASE < loaddata.sql
}

# ---------------------------------------------------------------------------
# MAIN: 
# ---------------------------------------------------------------------------
#1. Set Paths
setPath $1
echo "Displaying Variables: $SYMBOL: $SOURCE_DATA_PATH: $TARGET_DATA_PATH: $DB_PATH: $DATABASE" 	

#1. Clean the existing files
clean 

#2. Copy files corresponding to the symbol
stageData  


#3. Load files 
#loadData
