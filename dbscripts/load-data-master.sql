.separator "|"


-- ****************************************************************************
-- Import the SECTOR MASTER DATA
-- ****************************************************************************
DELETE FROM SECTOR_MASTER;

.import ../data/sector_id_master.txt SECTOR_MASTER

-- ****************************************************************************
-- Import the COMPANY MASTER DATA
-- ****************************************************************************
 DELETE FROM TMP_COMPANY_MASTER;

.import ../data/stock_id_master.txt TMP_COMPANY_MASTER

INSERT INTO COMPANY_MASTER 
       (COMPANY_ID, COMPANY_NAME, SYMBOL_BSE, SYMBOL_NSE, SYMBOL_ISIN, SYMBOL_MONEYCONTROL, SYMBOL_BBG, 
        SYMBOL_REUTER, SYMBOL_YAHOO, SYMBOL_MORNINGSTAR_NSE, SYMBOL_MORNINGSTAR_BSE, SYMBOL_MORNINGSTAR_DESC, 
        SYMBOL_EQM, SYMBOL_EQM_DESC, SYMBOL_ET, MARKET_CAP_TYPE, SECTOR_ID)
 SELECT COMPANY_ID, COMPANY_NAME, SYMBOL_BSE, SYMBOL_NSE, SYMBOL_ISIN, SYMBOL_MONEYCONTROL, SYMBOL_BBG, 
        SYMBOL_REUTER, SYMBOL_YAHOO, SYMBOL_MORNINGSTAR_NSE, SYMBOL_MORNINGSTAR_BSE, SYMBOL_MORNINGSTAR_DESC, 
        SYMBOL_EQM, SYMBOL_EQM_DESC, SYMBOL_ET, MARKET_CAP_TYPE,  
        (SELECT SECTOR_ID FROM SECTOR_MASTER SM WHERE SM.SECTOR_CODE_MC=TCM.SECTOR_CODE_MC) SECTOR_ID
   FROM TMP_COMPANY_MASTER TCM; 




