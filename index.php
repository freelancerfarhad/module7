<!-- video 1 -->
SELECT * FROM customer;
<!-- video 2 group by-->
SELECT * FROM customer GROUP BY CITY;
<!-- video 3 -group by ciry----->
SELECT COUNT(*) FROM customer GROUP BY CITY;
SELECT COUNT(*),CITY FROM customer GROUP BY CITY;
SELECT COUNT(*) as total,CITY FROM customer GROUP BY CITY;
SELECT COUNT(*) as total,CITY,STATE,POSTAL_CODE FROM customer GROUP BY CITY;
SELECT COUNT(*) as total,CITY,STATE,POSTAL_CODE FROM customer GROUP BY CITY,POSTAL_CODE;
<!-- video 4 -WHERE CONDICTION-->
SELECT * FROM `customer` WHERE CITY='salem';
SELECT * FROM `customer` WHERE CITY='salem'AND POSTAL_CODE='03079';
SELECT * FROM `customer` WHERE (CITY='salem'AND POSTAL_CODE='03079')OR CITY='Waltham';
SELECT * FROM `customer` WHERE (CITY='salem'AND POSTAL_CODE IN('03079','03078'))OR CITY='Waltham';
SELECT * FROM `customer` WHERE (CITY='salem'AND POSTAL_CODE IN('03079','03078'))OR (CITY='Waltham'AND POSTAL_CODE='02451');
<!-- video 5 -join table-->
SELECT * FROM customer,individual WHERE CITY='salem'AND customer.CUST_ID,individual.CUST_ID;
SELECT customer.*,individual.BIRTH_DATE,individual.FIRST_NAME FROM customer,individual WHERE CITY='salem'AND customer.CUST_ID=individual.CUST_ID;
SELECT customer.CUST_ID,customer.CITY,individual.BIRTH_DATE,individual.FIRST_NAME,individual.LAST_NAME,customer.POSTAL_CODE FROM customer,individual WHERE CITY='salem'AND customer.CUST_ID=individual.CUST_ID;

<!-- video 6-7 -inner join-->
SELECT customer.CUST_ID,customer.CITY,individual.BIRTH_DATE,individual.FIRST_NAME,individual.LAST_NAME,customer.POSTAL_CODE FROM customer JOIN individual on customer.CUST_ID=individual.CUST_ID;

<!-- video 8 -sum-->
SELECT sum(AVAIL_BALANCE),CUST_ID FROM account GROUP BY CUST_ID;
SELECT sum(AVAIL_BALANCE),CUST_ID,OPEN_BRANCH_ID FROM account GROUP BY CUST_ID,OPEN_BRANCH_ID;
<!-- video 9 -->
SELECT CUST_ID,OPEN_BRANCH_ID,sum(AVAIL_BALANCE)as total FROM account GROUP BY CUST_ID,OPEN_BRANCH_ID;
<!-- video 10 -account a 5000k takar besi thakle show koro-->
SELECT CUST_ID,sum(AVAIL_BALANCE)as total FROM account GROUP BY CUST_ID HAVING sum(AVAIL_BALANCE)>5000;
SELECT CUST_ID,sum(AVAIL_BALANCE)as total FROM account GROUP BY CUST_ID HAVING total>5000;
<!-- video 11 -subselect-->
SELECT * FROM(SELECT CUST_ID,sum(AVAIL_BALANCE)as total FROM account GROUP BY CUST_ID)as balance WHERE total>5000;
<!-- video 12 -joining old and new join-->
SELECT account.CUST_ID,sum(AVAIL_BALANCE)as total,individual.FIRST_NAME,individual.LAST_NAME,individual.BIRTH_DATE FROM account,individual WHERE individual.CUST_ID=account.CUST_ID GROUP BY CUST_ID HAVING total > 5000;
SELECT account.CUST_ID,sum(AVAIL_BALANCE)as total,individual.FIRST_NAME,individual.LAST_NAME,individual.BIRTH_DATE FROM account JOIN individual ON individual.CUST_ID=account.CUST_ID GROUP BY account.CUST_ID HAVING total > 5000;
SELECT * FROM(SELECT account.CUST_ID,sum(AVAIL_BALANCE)as total,individual.FIRST_NAME,individual.LAST_NAME,individual.BIRTH_DATE FROM account JOIN individual ON individual.CUST_ID=account.CUST_ID GROUP BY account.CUST_ID)as account WHERE total>5000;
<!-- video 13 -3 ta table join-->
SELECT account.CUST_ID,sum(AVAIL_BALANCE)as total,account.OPEN_BRANCH_ID,individual.FIRST_NAME,individual.LAST_NAME,individual.BIRTH_DATE,branch.NAME,branch.ADDRESS FROM account JOIN individual ON individual.CUST_ID=account.CUST_ID JOIN branch ON branch.BRANCH_ID=account.OPEN_BRANCH_ID GROUP BY account.CUST_ID HAVING total > 5000;
<!-- video 14 -inner join-->
SELECT individual.CUST_ID,individual.FIRST_NAME,individual.LAST_NAME,account.AVAIL_BALANCE,account.OPEN_EMP_ID FROM individual JOIN account ON account.CUST_ID=individual.CUST_ID;
<!-- video 15 -left join-->
SELECT *,individual.FIRST_NAME,individual.LAST_NAME FROM individual LEFT JOIN account ON account.CUST_ID=individual.CUST_ID;
<!-- video 16 -right join-->
SELECT *,individual.FIRST_NAME,individual.LAST_NAME FROM individual RIGHT JOIN account ON account.CUST_ID=individual.CUST_ID;