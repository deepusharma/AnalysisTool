-- ****************************************************************************
-- Temporary Tables for data load:
-- ****************************************************************************
DROP TABLE IF EXISTS TMP_COMPANY_MASTER;
CREATE TABLE IF NOT EXISTS TMP_COMPANY_MASTER (
    COMPANY_ID                        INTEGER,
    COMPANY_NAME                      VARCHAR(50),
    INDUSTRY_SECTOR                   VARCHAR(50),
    MARKET_CAP_TYPE                   VARCHAR(10),
    SYMBOL_BSE                        VARCHAR(20),
    SYMBOL_NSE                        VARCHAR(20),
    SYMBOL_ISIN                       VARCHAR(20),
    SYMBOL_MONEYCONTROL               VARCHAR(20),
    SECTOR_CODE_MC                    VARCHAR(20),
    SYMBOL_BBG                        VARCHAR(20),
    SYMBOL_EQM                        VARCHAR(20),
    SYMBOL_EQM_DESC                   VARCHAR(20),
    SYMBOL_REUTER                     VARCHAR(20),
    SYMBOL_YAHOO                      VARCHAR(20),
    SYMBOL_MORNINGSTAR_NSE            VARCHAR(20),
    SYMBOL_MORNINGSTAR_BSE            VARCHAR(20),
    SYMBOL_MORNINGSTAR_DESC           VARCHAR(20),
    SYMBOL_ET                         VARCHAR(20)
);


-- ****************************************************************************
-- Master Tables for data load:
-- ****************************************************************************
DROP TABLE IF EXISTS COMPANY_MASTER;
CREATE TABLE IF NOT EXISTS COMPANY_MASTER (
    COMPANY_ID                        INTEGER,
    COMPANY_NAME                      VARCHAR(50),
    SYMBOL_BSE                        VARCHAR(20),
    SYMBOL_NSE                        VARCHAR(20),
    SYMBOL_ISIN                       VARCHAR(20),
    SYMBOL_MONEYCONTROL               VARCHAR(20),
    SYMBOL_BBG                        VARCHAR(20),
    SYMBOL_REUTER                     VARCHAR(20),
    SYMBOL_YAHOO                      VARCHAR(20),
    SYMBOL_MORNINGSTAR_NSE            VARCHAR(20),
    SYMBOL_MORNINGSTAR_BSE            VARCHAR(20),
    SYMBOL_MORNINGSTAR_DESC           VARCHAR(20),
    SYMBOL_EQM                        VARCHAR(20),
    SYMBOL_EQM_DESC                   VARCHAR(20),
    SYMBOL_ET                         VARCHAR(20),
    MARKET_CAP_TYPE                   VARCHAR(10),
    SECTOR_ID                         INTEGER
);
  
    
   
DROP TABLE IF EXISTS SECTOR_MASTER;
CREATE TABLE IF NOT EXISTS SECTOR_MASTER (
    SECTOR_ID                         INTEGER,
    SECTOR_DESC                       INTEGER,
    SECTOR_CODE_MC                    VARCHAR(50),
    AVERAGE_PE                        FLOAT
);
