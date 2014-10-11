-- ****************************************************************************
-- Tables for Portfolio and WatchLists:
-- ****************************************************************************
DROP TABLE TRANSACTION_DATA;
CREATE TABLE IF NOT EXISTS TRANSACTION_DATA (
    ID                                INTEGER,
	STOCK_ID                          INTEGER,
    TRANSACTION_DATE                  DATE,
	BUY_SELL_IND                      CHAR(1),
	QUANTITY                          FLOAT,
	PRICE                             FLOAT,
    BROKERAGE                         FLOAT,
    STT                               FLOAT,	
	EXCHANGE                          VARCHAR(20)	
); 


DROP TABLE WATCHLIST;
CREATE TABLE IF NOT EXISTS WATCHLIST(
    ID                                INTEGER,
	STOCK_ID                          INTEGER,
	PRICE_ON_RECO_DATE                FLOAT,
	RECO_DATE                         DATE,
    RECO_BY                           VARCHAR(40),
	RECO_PRICE                        FLOAT,
	TARGET_PRICE                      FLOAT,
	TARGET_DATE_RANGE                 VARCHAR(20),
	NOTES                             VARCHAR(50)
);
