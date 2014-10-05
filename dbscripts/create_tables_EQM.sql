-- ****************************************************************************
-- Temporary Tables for data load:
-- ****************************************************************************
DROP TABLE TMP_EQM_PRICE_HISTORY;
CREATE TABLE TMP_EQM_PRICE_HISTORY (
    COMPANY_CODE                          VARCHAR(4),
    PRICE_COL_NAME                        VARCHAR(50),
    PRICE_COL_UNIT                        VARCHAR(50),
    PRICE                                 FLOAT,
    SHARES_OUTSTANDING_COL_NAME           VARCHAR(50),
    SHARES_OUTSTANDING_COL_UNIT           VARCHAR(50),
    SHARES_OUTSTANDING                    INTEGER,
    MARKET_CAP_COL_NAME                   VARCHAR(50),
    MARKET_CAP_COL_UNIT                   VARCHAR(50),
    MARKET_CAP                            INTEGER,
    PERCENT_CHANGE_COL_NAME               VARCHAR(50),
    PERCENT_CHANGE_COL_UNIT               VARCHAR(50),
    PERCENT_CHANGE                        FLOAT,
    VOLUME_COL_NAME                       VARCHAR(50),
    VOLUME_COL_UNIT                       VARCHAR(50),
    VOLUME                                INTEGER,
    PERCENT_CHANGE_WEEK_COL_NAME          VARCHAR(50),
    PERCENT_CHANGE_WEEK_COL_UNIT          VARCHAR(50),
    PERCENT_CHANGE_WEEK                   FLOAT,
    P_E_COL_NAME                          VARCHAR(50),
    P_E_COL_UNIT                          VARCHAR(50),
    P_E                                   FLOAT,
    PERCENT_CHANGE_MONTH_COL_NAME         VARCHAR(50),
    PERCENT_CHANGE_MONTH_COL_UNIT         VARCHAR(50),
    PERCENT_CHANGE_MONTH                  FLOAT,
    P_CF_COL_NAME                         VARCHAR(50),
    P_CF_COL_UNIT                         VARCHAR(50),
    P_CF                                  FLOAT,
    PERCENT_CHANGE_12MONTH_COL_NAME       VARCHAR(50),
    PERCENT_CHANGE_12MONTH_COL_UNIT       VARCHAR(50),
    PERCENT_CHANGE_12MONTH                FLOAT,
    EPS_TTM_COL_NAME                      VARCHAR(50),
    EPS_TTM_COL_UNIT                      VARCHAR(50),
    EPS_TTM                               FLOAT,
    LOWHIGH_52_WEEK_COL_NAME              VARCHAR(50),
    LOWHIGH_52_WEEK_COL_UNIT              VARCHAR(50),
    LOWHIGH_52_WEEK                       FLOAT
);



DROP TABLE TMP_EQM_5YEAR_DATA;
CREATE TABLE TMP_EQM_5YEAR_DATA (
    COMPANY_CODE                      VARCHAR(4),
    DATA_TYPE                         VARCHAR(50),
    DATA_UNIT                         VARCHAR(50),
    DATA_YEAR1                        VARCHAR(50),    
    DATA_YEAR2                        VARCHAR(50),
    DATA_YEAR3                        VARCHAR(50),
    DATA_YEAR4                        VARCHAR(50),
    DATA_YEAR5                        VARCHAR(50)
);



DROP TABLE TMP_EQM_SHAREHOLDING;
CREATE TABLE TMP_EQM_SHAREHOLDING (
   COMPANY_CODE                       VARCHAR(4),
   INDIAN_PROMOTERS_DESC              VARCHAR(40),   
   INDIAN_PROMOTERS                   FLOAT,   
   FOREIGN_COLLABORATORS_DESC         VARCHAR(40),
   FOREIGN_COLLABORATORS              FLOAT,
   INDIAN_INST_MUT_FUND_DESC          VARCHAR(40),
   INDIAN_INST_MUT_FUND               FLOAT,
   FIIS_DESC                          VARCHAR(40),
   FIIS                               FLOAT,
   ADR_GDR_DESC                       VARCHAR(40),
   ADR_GDR                            FLOAT,
   FREE_FLOAT_DESC                    VARCHAR(40),   
   FREE_FLOAT                         FLOAT,   
   SHAREHOLDERS_DESC                  VARCHAR(40),
   SHAREHOLDERS                       FLOAT,
   PLEDGED_PROMOTER_HOLDING_DESC      VARCHAR(40),
   PLEDGED_PROMOTER_HOLDING           FLOAT
);


    

DROP TABLE EQM_PRICE_HISTORY;
CREATE TABLE EQM_PRICE_HISTORY (
    COMPANY_ID                        INTEGER,
    RECORD_DATE                       DATE,
    PRICE                             FLOAT,
    MARKET_CAP                        INTEGER,
    VOLUME                            INTEGER,
    P_E                               FLOAT,
    P_CF                              FLOAT,
    EPS_TTM                           FLOAT,
    SHARES_OUTSTANDING                INTEGER,
    PERCENT_CHANGE                    FLOAT,
    PERCENT_CHANGE_WEEK               FLOAT,
    PERCENT_CHANGE_MONTH              FLOAT,
    PERCENT_CHANGE_12MONTH            FLOAT,
    HIGH_52_WEEK                      FLOAT,
    HIGH_52_LOW                       FLOAT    
);


DROP TABLE EQM_EQUITY_SHARE_DATA;
CREATE TABLE EQM_EQUITY_SHARE_DATA (
    COMPANY_ID                        INTEGER,
    RECORD_DATE                       DATE,
    FINANCIAL_YEAR                    INTEGER,
    HIGH                              FLOAT,
    LOW                               FLOAT,
    SALES_PER_SHARE_UNADJ             FLOAT,
    EARNINGS_PER_SHARE_UNADJ          FLOAT,
    DILUTED_EARNINGS_PER_SHARE        FLOAT,
    CASH_FLOW_PER_SHARE_UNADJ         FLOAT,
    DIVIDENDS_PER_SHARE_UNADJ         FLOAT,
    ADJ_DIVIDENDS_PER_SHARE           FLOAT,
    DIVIDEND_YIELD_EOY                FLOAT,
    BOOK_VALUE_PER_SHARE_UNADJ        FLOAT,
    ADJ_BOOK_VALUE_PER_SHARE          FLOAT,
    SHARES_OUTSTANDING_EOY            FLOAT,
    BONUS_RIGHTS_CONVERSIONS          FLOAT,
    PRICE_BY_SALES_RATIO              FLOAT,
    AVG_PE_RATIO                      FLOAT,
    PRICE_BY_CASHFLOW_RATIO_EOY       FLOAT,
    PRICE_BY_BOOK_VALUE_RATIO         FLOAT,
    DIVIDEND_PAYOUT                   FLOAT,
    AVG_MARKET_CAP                    FLOAT,
    NO_OF_EMPLOYEES                   FLOAT,
    TOTAL_WAGES_PER_SALARY            FLOAT,
    AVG_SALES_PER_EMPLOYEE            FLOAT,
    AVG_WAGES_PER_EMPLOYEE            FLOAT,
    AVG_NET_PROFIT_PER_EMPLOYEE       FLOAT
);




DROP TABLE EQM_INCOME_DATA;
CREATE TABLE EQM_INCOME_DATA(
    COMPANY_ID                      INTEGER,
    RECORD_DATE                     DATE,
    FINANCIAL_YEAR                  INTEGER,
    NET_SALES                       FLOAT,
    OTHER_INCOME                    FLOAT,
    TOTAL_REVENUES                  FLOAT,
    GROSS_PROFIT                    FLOAT,
    DEPRECIATION                    FLOAT,
    INTEREST                        FLOAT,
    PROFIT_BEFORE_TAX               FLOAT,
    MINORITY_INTEREST               FLOAT,
    PRIOR_PERIOD_ITEMS              FLOAT,
    EXTRAORDINARY_INC_EXP           FLOAT,
    TAX                             FLOAT,
    PROFIT_AFTER_TAX                FLOAT,
    GROSS_PROFIT_MARGIN             FLOAT,
    EFFECTIVE_TAX_RATE              FLOAT,
    NET_PROFIT_MARGIN               FLOAT
);




DROP TABLE EQM_BALANCE_SHEET_DATA;
CREATE TABLE EQM_BALANCE_SHEET_DATA (
    COMPANY_ID                      INTEGER,
    RECORD_DATE                     DATE,
    FINANCIAL_YEAR                  INTEGER,
    CURRENT_ASSETS                  FLOAT,                
    CURRENT_LIABILITIES             FLOAT,        
    NET_WORKING_CAP_TO_SALES        FLOAT,
    CURRENT_RATIO                   FLOAT,
    INVENTORY_DAYS                  FLOAT,
    DEBTORS_DAYS                    FLOAT,
    NET_FIXED_ASSETS                FLOAT,
    SHARE_CAPITAL                   FLOAT,    
    FREE_RESERVES                   FLOAT,    
    NET_WORTH                       FLOAT,
    LONG_TERM_DEBT                  FLOAT,    
    TOTAL_ASSETS                    FLOAT,
    INTEREST_COVERAGE               FLOAT,        
    DEBT_TO_EQUITY_RATIO            FLOAT,
    SALES_TO_ASSETS_RATIO           FLOAT,            
    RETURN_ON_ASSETS                FLOAT,
    RETURN_ON_EQUITY                FLOAT,
    RETURN_ON_CAPITAL               FLOAT,
    EXPORTS_TO_SALES                FLOAT,        
    IMPORTS_TO_SALES                FLOAT,        
    EXPORTS_FOB                     FLOAT,    
    IMPORTS_CIF                     FLOAT,    
    FX_INFLOW                       FLOAT,
    FX_OUTFLOW                      FLOAT,
    NET_FX                          FLOAT    
);

 


DROP TABLE EQM_COMPANY_INFORMATION;
CREATE TABLE EQM_COMPANY_INFORMATION (
    COMPANY_ID                  INTEGER,
    RECORD_DATE                 DATE,
    REGD_OFF                    VARCHAR(200),
    E_MAIL                      VARCHAR(30),
    TELEPHONE                   VARCHAR(30),
    TR_AGENT                    VARCHAR(30),
    AUDITOR                     VARCHAR(30),   
    WEB                         VARCHAR(30),
    FAX                         VARCHAR(30),
    INDUSTRY_SECTOR             VARCHAR(30),
    INDUSTRY_GROUP              VARCHAR(30),
    CHAIRMAN                    VARCHAR(30),
    COMPANY_SECRETARY           VARCHAR(30),
    FACE_VALUE                  INTEGER,
    DIVIDEND_YIELD              FLOAT
);




DROP TABLE EQM_CASHFLOW;
CREATE TABLE EQM_CASHFLOW (
   COMPANY_ID                   INTEGER,
   RECORD_DATE                  DATE,
   FINANCIAL_YEAR               INTEGER,
   FROM_OPERATIONS              FLOAT,         
   FROM_INVESTMENTS             FLOAT,
   FROM_FINANCIAL_ACTIVITY      FLOAT,
   NET_CASHFLOW                 FLOAT
);




DROP TABLE EQM_SHAREHOLDING;
CREATE TABLE EQM_SHAREHOLDING (
   COMPANY_ID                   INTEGER,
   RECORD_DATE                  DATE,
   INDIAN_PROMOTERS             FLOAT,   
   FOREIGN_COLLABORATORS        FLOAT,
   INDIAN_INST_MUT_FUND         FLOAT,
   FIIS                         FLOAT,
   ADR_GDR                      FLOAT,
   FREE_FLOAT                   FLOAT,   
   SHAREHOLDERS                 FLOAT,
   PLEDGED_PROMOTER_HOLDING     FLOAT
);
