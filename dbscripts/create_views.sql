
DROP VIEW VW_COMPANY_URL;

CREATE VIEW VW_COMPANY_URL AS
SELECT COMPANY_ID, COMPANY_NAME, SYMBOL_BSE, SYMBOL_NSE, SYMBOL_ISIN, 
       SYMBOL_MORNINGSTAR_NSE, SYMBOL_MORNINGSTAR_BSE, SYMBOL_MORNINGSTAR_DESC, SYMBOL_MONEYCONTROL, SYMBOL_BBG, 
       SYMBOL_EQM, SYMBOL_EQM_DESC, SYMBOL_REUTER || '.NS' SYMBOL_REUTER_NSE, SYMBOL_REUTER || '.BO' SYMBOL_REUTER_BSE, 
       SYMBOL_YAHOO, SYMBOL_ET, MARKET_CAP_TYPE, CM.SECTOR_ID,
       'http://www.moneycontrol.com/india/stockpricequote/' ||  SM.SECTOR_CODE_MC  ||  '/' || LOWER(COMPANY_NAME) || '/' ||  SYMBOL_MONEYCONTROL   URL_MONEYCONTROL,
       'http://www.valueexplorer.com/analyzer/company/' || SYMBOL_ISIN URL_VALUE_EXPLORER,
       'http://www.equitymaster.com/result.asp?symbol=' || SYMBOL_EQM URL_EQM,
       'https://www.google.com/finance?q=NSE:' || SYMBOL_NSE  URL_GOOGLE_NSE, 
       'https://www.google.com/finance?q=BOM:' || SYMBOL_BSE  URL_GOOGLE_BSE,
       'http://www.morningstar.in/stocks/' || SYMBOL_MORNINGSTAR_NSE || "/" || 'nse-' || SYMBOL_MORNINGSTAR_DESC  || '/overview.aspx' URL_MORNING_STAR_NSE,
       'http://www.morningstar.in/stocks/' || SYMBOL_MORNINGSTAR_BSE || "/" || 'bse-' || SYMBOL_MORNINGSTAR_DESC  || '/overview.aspx' URL_MORNING_STAR_BSE,
       'https://in.finance.yahoo.com/q?s=' || SYMBOL_YAHOO || '.NS' URL_YAHOO_NSE,
       'https://in.finance.yahoo.com/q?s=' || SYMBOL_YAHOO || '.BO' URL_YAHOO_BSE,
       'http://in.reuters.com/finance/stocks/financialHighlights?symbol=' || SYMBOL_REUTER || '.NS' URL_REUTERS_NSE,
       'http://in.reuters.com/finance/stocks/financialHighlights?symbol=' || SYMBOL_REUTER || '.BO' URL_REUTERS_BSE,
       'http://investing.businessweek.com/research/stocks/financials/financials.asp?ticker=' || SYMBOL_BBG URL_BUSINESSWEEK,
       'http://www.bloomberg.com/quote/' || SYMBOL_BBG URL_BBG,
       'http://economictimes.indiatimes.com/stocks/companyid-' || SYMBOL_ET || '.cms' URL_ET
  FROM COMPANY_MASTER CM, SECTOR_MASTER SM
 WHERE SM.SECTOR_ID = CM.SECTOR_ID;
 
    