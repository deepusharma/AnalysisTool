DROP  TABLE IF EXISTS BALANCESHEET_STATEMENT;
CREATE TABLE IF NOT EXISTS BALANCESHEET_STATEMENT (
    ID                                INTEGER,
	STOCK_ID                          INTEGER	
);



DROP  TABLE IF EXISTS INCOME_STATEMENT;
CREATE TABLE IF NOT EXISTS INCOME_STATEMENT (
    ID                                INTEGER,
	STOCK_ID                          INTEGER	
);




DROP  TABLE IF EXISTS CASHFLOW_STATEMENT;
CREATE TABLE IF NOT EXISTS CASHFLOW_STATEMENT (
    ID                                INTEGER,
	STOCK_ID                          INTEGER	
);
