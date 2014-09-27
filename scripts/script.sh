#user inputs - 	1. search pattern for step 1
#		2. input filename
#		3. final output filename

#------------------------------------------------------------------------------
#
#------------------------------------------------------------------------------
init(){
	export EQM_CODE=$1
	export EQM_NAME=$2
	export TEMP_PATH="../temp"
	export TEMP_FILE1=$TEMP_PATH/1
	export TEMP_FILE2=$TEMP_PATH/2
	export TEMP_FILE3=$TEMP_PATH/3
	export TEMP_FILE4=$TEMP_PATH/4
	export TEMP_FILE5=$TEMP_PATH/5
	export TEMP_FILE6=$TEMP_PATH/6
	export TEMP_FILE7=$TEMP_PATH/7

	export URL="http://www.equitymaster.com/research-it/company-info/detailed-financial-information.asp?symbol="$EQM_CODE"&name="$EQM_NAME"-Detailed-Financial-Data&utm_source=stockquote-page&utm_medium=website&utm_campaign=rightband&utm_content=factsheet"

	export EQM_DATA_FILE="$TEMP_PATH/data_$EQM_CODE"
	export EQM_PH_FILE="$TEMP_PATH/data_$EQM_CODE"_PH
	export EQM_ES_FILE="$TEMP_PATH/data_$EQM_CODE"_ES
	export EQM_ID_FILE="$TEMP_PATH/data_$EQM_CODE"_ID
	export EQM_BS_FILE="$TEMP_PATH/data_$EQM_CODE"_BS
	export EQM_CF_FILE="$TEMP_PATH/data_$EQM_CODE"_CF
	export EQM_SP_FILE="$TEMP_PATH/data_$EQM_CODE"_SP

       echo  "ok    $EQM_CODE $EQM_NAME"
}

#------------------------------------------------------------------------------
#
#------------------------------------------------------------------------------
extract_PH_old(){

	cleanup 

	#price History file
	awk '/Price History/ {p=1}; p; /End of Price History/ {p=0}' $EQM_DATA_FILE > $TEMP_FILE1
	sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>//g' $TEMP_FILE1 > $TEMP_FILE2
	sed -r 's/^.*&nbsp;.*//' $TEMP_FILE2 |  tr -s '\t' '\t' > $TEMP_FILE3
	cat $TEMP_FILE3 | tr -d " \t" > $TEMP_FILE4
	sed '/^$/d' $TEMP_FILE4 > $TEMP_FILE5
	grep -i -e "^[0-9]" -e "^-" -e "NM$" -e "NA$" $TEMP_FILE5  > $TEMP_FILE6
	grep -v -e ".*[0-9].*[a-zA-Z]" $TEMP_FILE6 > $TEMP_FILE7
	perl -pe 's/\r?\n/|/' $TEMP_FILE7 > $EQM_PH_FILE

}




extract_PH(){

	cleanup 

	#price History file
	awk '/Price History/ {p=1}; p; /End of Price History/ {p=0}' $EQM_DATA_FILE > $TEMP_FILE1
	sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>//g' $TEMP_FILE1 > $TEMP_FILE2
	sed -r 's/&nbsp;//g' $TEMP_FILE2 | tr -s '\t' '\t' > $TEMP_FILE3
	cat $TEMP_FILE3 | tr -d " \t" | tr -d "\r" > $TEMP_FILE4
	sed '/^$/d' $TEMP_FILE4 > $TEMP_FILE5
	tail -38 $TEMP_FILE5 | head -36 |perl -pe 's/\r?\n/|/' > $EQM_PH_FILE

}
#------------------------------------------------------------------------------
#
#------------------------------------------------------------------------------
extract_ES_old(){

	cleanup 

	# Equity share data file
	awk '/EQUITY SHARE DATA/ {p=1}; p; /INCOME DATA/ {p=0}' $EQM_DATA_FILE > $TEMP_FILE1
	sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' $TEMP_FILE1 > $TEMP_FILE2
	sed -r 's/&nbsp;.*//' $TEMP_FILE2 |  tr -s '\t' '\t' > $TEMP_FILE3
	sed -e 's/^[ \t\.]*//' $TEMP_FILE3 | cut -f 2-6 | tr -s '\t' '|' | sed '/^\n$/d' > $EQM_ES_FILE


}

extract_ES(){

	cleanup 

	# Equity share data file
	awk '/EQUITY SHARE DATA/ {p=1}; p; /INCOME DATA/ {p=0}' $EQM_DATA_FILE > $TEMP_FILE1
	sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' $TEMP_FILE1 | tr -s '\t' '\t'> $TEMP_FILE2
	#tr -s '\t' '\t' $TEMP_FILE2 > $TEMP_FILE3
	perl -pe 's/\r?\n/\t/' $TEMP_FILE2 | tr -s '\t' '\t' > $TEMP_FILE3
	sed -e 's/Bonus\/Rights\/Conversions\t  \t\&nbsp\;/BRC\t  \tNA/' $TEMP_FILE3 > $TEMP_FILE4
	perl -pe 's/\&nbsp\;/\n/g' $TEMP_FILE4 > $TEMP_FILE5
	perl -pe 's/EQUITY SHARE DATA|INCOME DATA//g' $TEMP_FILE5 > $TEMP_FILE6
	sed -e 's/\t  \t/\t/g' -e 's/^\t//g' $TEMP_FILE6 > $TEMP_FILE7
	sed '/^\s*$/d' $TEMP_FILE7 | sed -e 's/\t/|/g' -e 's/,//g'  > $EQM_ES_FILE
	#sed -r 's/&nbsp;.*//' $TEMP_FILE2 |  tr -s '\t' '\t' > $TEMP_FILE3
	#sed -e 's/^[ \t\.]*//' $TEMP_FILE3 | cut -f 2-6 | tr -s '\t' '|' | sed '/^\s*$/d'| tr -d "\r" > $EQM_ES_FILE


        #### Examples for sed
        ####$ sed 's/^ *//; s/ *$//; /^$/d; /^\s*$/d' file.txt > output.txt

        ####`s/^ *//`  => left trim
        ####`s/ *$//`  => right trim
        ####`/^$/d`    => remove empty line
        ####`/^\s*$/d` => delete lines which may contain white space



}

#------------------------------------------------------------------------------
#
#------------------------------------------------------------------------------
extract_ID_old(){
	cleanup 

	# Income Data file
	awk '/INCOME DATA/ {p=1}; p; /BALANCE SHEET DATA/ {p=0}' $EQM_DATA_FILE > $TEMP_FILE1
	sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' $TEMP_FILE1 > $TEMP_FILE2
	sed -r 's/&nbsp;.*//' $TEMP_FILE2 |  tr -s '\t' '\t' > $TEMP_FILE3
	cat $TEMP_FILE3 | tr -d " \t" > $TEMP_FILE4
	#tr -d ' '  < $TEMP_FILE3 | sed 's/[a-zA-Z%]//'g > $TEMP_FILE5
	sed -e 's/^[ \t\.]*//' $TEMP_FILE4 > $TEMP_FILE5
	tr -s '\t' '|' < $TEMP_FILE5 > $EQM_ID_FILE

}

extract_ID(){
	cleanup 

	# Income Data file
	awk '/INCOME DATA/ {p=1}; p; /BALANCE SHEET DATA/ {p=0}' $EQM_DATA_FILE > $TEMP_FILE1
	sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' $TEMP_FILE1 > $TEMP_FILE2
	
	perl -pe 's/\r?\n/\t/' $TEMP_FILE2 | tr -s '\t' '\t' > $TEMP_FILE3
	perl -pe 's/\&nbsp\;/\n/g' $TEMP_FILE3 > $TEMP_FILE4
	perl -pe 's/INCOME DATA	|BALANCE SHEET DATA//g' $TEMP_FILE4 > $TEMP_FILE5
	sed -e 's/\t  \t/\t/g' -e 's/^\t//g' $TEMP_FILE5 > $TEMP_FILE6
	sed '/^\s*$/d' $TEMP_FILE6 | sed -e 's/\t/|/g' -e 's/,//g'  > $EQM_ID_FILE
	
	#sed -r 's/&nbsp;.*//' $TEMP_FILE2 |  tr -s '\t' '\t' > $TEMP_FILE3
	#cat $TEMP_FILE3 | tr -d " \t" > $TEMP_FILE4
	#tr -d ' '  < $TEMP_FILE3 | sed 's/[a-zA-Z%]//'g > $TEMP_FILE5
	#sed -e 's/^[ \t\.]*//' $TEMP_FILE4 > $TEMP_FILE5
	#tr -s '\t' '|' < $TEMP_FILE5 > $EQM_ID_FILE

}
#------------------------------------------------------------------------------
#
#------------------------------------------------------------------------------
extract_BS_old(){

	cleanup 

	# BALANCE SHEET DATA file
	awk '/BALANCE SHEET DATA/ {p=1}; p; /CASH FLOW/ {p=0}' $EQM_DATA_FILE > $TEMP_FILE1
	sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' $TEMP_FILE1 > $TEMP_FILE2
	#grep -e [0-9] $TEMP_FILE2 > $TEMP_FILE3
	sed -r 's/&nbsp;.*//' $TEMP_FILE2 |  tr -s '\t' '\t' > $TEMP_FILE3
	sed -e 's/^[ \t\.]*//' $TEMP_FILE3 | cut -f 2-6 | tr -s '\t' '|' > $EQM_BS_FILE



}

extract_BS(){

	cleanup 

	# BALANCE SHEET DATA file
	awk '/BALANCE SHEET DATA/ {p=1}; p; /CASH FLOW/ {p=0}' $EQM_DATA_FILE > $TEMP_FILE1
	sed 's/\"Free\"/Free/' $TEMP_FILE1 > $TEMP_FILE2
	sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' $TEMP_FILE2 > $TEMP_FILE3
	
	perl -pe 's/\r?\n/\t/' $TEMP_FILE3 | tr -s '\t' '\t' > $TEMP_FILE4
	perl -pe 's/\&nbsp\;/\n/g' $TEMP_FILE4 > $TEMP_FILE5
	perl -pe 's/BALANCE SHEET DATA|-->|CASH FLOW//g' $TEMP_FILE5 > $TEMP_FILE6
	sed -e 's/\t  \t/\t/g' -e 's/^\t//g' $TEMP_FILE6 > $TEMP_FILE7
	sed '/^\s*$/d' $TEMP_FILE7 | sed -e 's/^\t//g' -e 's/\t/|/g' -e 's/,//g' > $EQM_BS_FILE
	
	#grep -e [0-9] $TEMP_FILE2 > $TEMP_FILE3
	#sed -r 's/&nbsp;.*//' $TEMP_FILE2 |  tr -s '\t' '\t' > $TEMP_FILE3
	#sed -e 's/^[ \t\.]*//' $TEMP_FILE3 | cut -f 2-6 | tr -s '\t' '|' > $EQM_BS_FILE



}
#------------------------------------------------------------------------------
#
#------------------------------------------------------------------------------
extract_CF_old(){
	cleanup 

	#CASH FLOW data file
	awk '/CASH FLOW/ {p=1}; p; /Results Consolidated/ {p=0}' $EQM_DATA_FILE > $TEMP_FILE1
	sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' $TEMP_FILE1 > $TEMP_FILE2
	#grep -e [0-9] $TEMP_FILE2 > $TEMP_FILE3
	sed -r 's/&nbsp;.*//' $TEMP_FILE2 |  tr -s '\t' '\t' > $TEMP_FILE3
	sed -e 's/^[ \t\.]*//' $TEMP_FILE3 | cut -f 2-6 | tr -s '\t' '|' > $EQM_CF_FILE

}

extract_CF(){
	cleanup 

	#CASH FLOW data file
	awk '/CASH FLOW/ {p=1}; p; /Results Consolidated/ {p=0}' $EQM_DATA_FILE > $TEMP_FILE1
	sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' $TEMP_FILE1 > $TEMP_FILE2
	
	perl -pe 's/\r?\n/\t/' $TEMP_FILE2 | tr -s '\t' '\t' > $TEMP_FILE3
	perl -pe 's/\&nbsp\;/\n/g' $TEMP_FILE3 > $TEMP_FILE4
	perl -pe 's/CASH FLOW|^.*Results Consolidated//g' $TEMP_FILE4 > $TEMP_FILE5
	sed -e 's/\t  \t/\t/g' -e 's/^\t//g' $TEMP_FILE5 > $TEMP_FILE6
	sed '/^\s*$/d' $TEMP_FILE6 | sed -e 's/^\t//g' -e 's/\t/|/g' -e 's/,//g' > $EQM_CF_FILE
	
	#grep -e [0-9] $TEMP_FILE2 > $TEMP_FILE3
	#sed -r 's/&nbsp;.*//' $TEMP_FILE2 |  tr -s '\t' '\t' > $TEMP_FILE3
	#sed -e 's/^[ \t\.]*//' $TEMP_FILE3 | cut -f 2-6 | tr -s '\t' '|' > $EQM_CF_FILE

}

#------------------------------------------------------------------------------
#
#------------------------------------------------------------------------------
extract_SP_old(){

	cleanup 

	#Shreholding pattern data file
	awk '/Shareholding Pattern/ {p=1}; p; /End of Shareholding Patterm/ {p=0}' $EQM_DATA_FILE > $TEMP_FILE1
	sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' $TEMP_FILE1 > $TEMP_FILE2
	#grep -e [0-9] $TEMP_FILE2 > $TEMP_FILE3
	sed -r 's/&nbsp;.*//' $TEMP_FILE2 |  tr -s '\t' '\t' > $TEMP_FILE3
	cut -f 2 $TEMP_FILE3 | perl -pe 's/\r?\n/|/' > $EQM_SP_FILE

}

extract_SP(){

	cleanup 

	#Shreholding pattern data file
	awk '/Shareholding Pattern/ {p=1}; p; /End of Shareholding Patterm/ {p=0}' $EQM_DATA_FILE > $TEMP_FILE1
	sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' $TEMP_FILE1 > $TEMP_FILE2
	
	sed -r 's/&nbsp;//g' $TEMP_FILE2 | tr -s '\t' '\t' > $TEMP_FILE3
	cat $TEMP_FILE3 | tr -d "\t \t" | tr -d "\r" > $TEMP_FILE4
	#cat $TEMP_FILE3 | tr -d " \t" > $TEMP_FILE4
	sed 's/^:.*//g' $TEMP_FILE4 | sed '/^$/d' > $TEMP_FILE5
	#tail -38 $TEMP_FILE5 | head -36 |
	perl -pe 's/ShareHolding|Top//g' $TEMP_FILE5 | perl -pe 's/\r?\n/|/' > $EQM_SP_FILE
	#grep -e [0-9] $TEMP_FILE2 > $TEMP_FILE3
	#sed -r 's/&nbsp;.*//' $TEMP_FILE2 |  tr -s '\t' '\t' > $TEMP_FILE3
	#cut -f 2 $TEMP_FILE3 | perl -pe 's/\r?\n/|/' > $EQM_SP_FILE

}



#------------------------------------------------------------------------------
#
#------------------------------------------------------------------------------
cleanup(){
        echo  "hola   $TEMP_FILE"*
   	#rm -f "$TEMP_FILE"*
}




#------------------------------------------------------------------------------
# Main processing
#------------------------------------------------------------------------------

	# Initialize:
	init $1 $2

	# extract data from the website:
	#wget $URL -O $EQM_DATA_FILE


	# Extract Price History Data: 
	extract_PH


	# Extract Balance Sheet Data:
	extract_BS


	# Extract Equity Share Data:
	extract_ES


	# Extract Income Data:
	extract_ID


	# Extract Cashflow Data:
	extract_CF


	# Extract Shareholding pattern Data:
	extract_SP

	# cleaning all temp files:
	#cleanup

	exit 0
