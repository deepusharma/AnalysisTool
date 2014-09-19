#grep -n -e "Price History" SUN_PHARMA_5Year.txt
#sed -n '1p;$p' sample.txt
#sed -n '231,335p' SUN_PHARMA_5Year.txt
#ln_num=$(grep -n -e "Price History" SUN_PHARMA_5Year.txt | sed -n '1p;$p' | cut -d : -f 1 | tr '\n' ',')
#echo $ln_num
#user inputs - 	1. search pattern for step 1
#		2. input filename
#		3. final output filename

#price History file
awk '/Price History/ {p=1}; p; /End of Price History/ {p=0}' Jammu_Kashmir_bank.txt > 1.txt
sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>//g' 1.txt > 2.txt
sed -r 's/^.*&nbsp;//' 2.txt > 3.txt
cat 3.txt | tr -d " \t" > 4.txt
grep -e [0-9] 4.txt > 5.txt
grep -v -e [a-z] -e [A-Z] -e "'" 5.txt > 6.txt
perl -pe 's/\r?\n/|/' 6.txt > price_History.txt


# Equity share data file
awk '/EQUITY SHARE DATA/ {p=1}; p; /INCOME DATA/ {p=0}' Jammu_Kashmir_bank.txt > 1.txt
sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' 1.txt > 2.txt
#grep -e [0-9&nbsp] 2.txt > 3.txt
sed -r 's/&nbsp;.*//' 2.txt |  tr -s '\t' '\t' > 3.txt
#sed -r 's/&nbsp;//' 3.txt |  tr -s '\t' '\t' > 4.txt
#tr -d ' '  < 4.txt | sed 's/[a-zA-Z;&%]//'g > 5.txt
#sed -e 's/^[ \t\.]*//' 5.txt > 6.txt
sed -e 's/^[ \t\.]*//' 3.txt | cut -f 2-6 | tr -s '\t' '|' | sed '/^$/d' > Equity_share.txt
#sed 's/'\`'000\t\t//g' 6.txt |  tr -s '\t' '|' | sed 's/|(.*)|//g' > Equity_share.txt

# Income Data file
awk '/INCOME DATA/ {p=1}; p; /BALANCE SHEET DATA/ {p=0}' Jammu_Kashmir_bank.txt > 1.txt
sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' 1.txt > 2.txt
grep -e [0-9] 2.txt > 3.txt
sed -r 's/&nbsp;//' 3.txt |  tr -s '\t' '\t' > 4.txt
tr -d ' '  < 4.txt | sed 's/[a-zA-Z%]//'g > 5.txt
sed -e 's/^[ \t\.]*//' 5.txt > 6.txt
tr -s '\t' '|' < 6.txt > Income_Data.txt

# BALANCE SHEET DATA file
awk '/BALANCE SHEET DATA/ {p=1}; p; /CASH FLOW/ {p=0}' Jammu_Kashmir_bank.txt > 1.txt
sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' 1.txt > 2.txt
grep -e [0-9] 2.txt > 3.txt
sed -r 's/&nbsp;.*//' 3.txt |  tr -s '\t' '\t' > 4.txt
sed -e 's/^[ \t\.]*//' 4.txt | cut -f 2-6 | tr -s '\t' '|' > BALANCE_SHEET.txt

#CASH FLOW data file
awk '/CASH FLOW/ {p=1}; p; /Results Consolidated/ {p=0}' Jammu_Kashmir_bank.txt > 1.txt
sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' 1.txt > 2.txt
grep -e [0-9] 2.txt > 3.txt
sed -r 's/&nbsp;.*//' 3.txt |  tr -s '\t' '\t' > 4.txt
sed -e 's/^[ \t\.]*//' 4.txt | cut -f 2-6 | tr -s '\t' '|' > CASH_FLOW.txt

#Shreholding pattern data file
awk '/Shareholding Pattern/ {p=1}; p; /End of Shareholding Patterm/ {p=0}' Jammu_Kashmir_bank.txt > 1.txt
sed 's/<\([^>]\|\(\"[^\"]\"\)\)*>/\t/g' 1.txt > 2.txt
grep -e [0-9] 2.txt > 3.txt
sed -r 's/&nbsp;.*//' 3.txt |  tr -s '\t' '\t' > 4.txt
cut -f 2 4.txt | perl -pe 's/\r?\n/|/' > Shreholding_pattern.txt
rm 1.txt 2.txt 3.txt 4.txt 5.txt 6.txt 

