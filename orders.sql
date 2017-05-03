DROP TABLE IF EXISTS ORDERS;
DROP TABLE IF EXISTS ORDERDETAILS;

CREATE TABLE ORDERS(
    ID INT NOT NULL AUTO_INCREMENT,
    USERID INT,
	FNAME VARCHAR (25) NOT NULL,
	LNAME VARCHAR (25) NOT NULL,
	STREET VARCHAR (128) NOT NULL,
	CITY VARCHAR (128) NOT NULL,
	USSTATE VARCHAR (128) NOT NULL,
	ZIP VARCHAR (5) NOT NULL,
	PHONE VARCHAR (11) NOT NULL,
    STOREID INT NOT NULL,
    ORDERDATE DATE NOT NULL,
	ORDERTIME TIME NOT NULL,
    STATUS VARCHAR(128) NOT NULL,
    TOTALP INT NOT NULL,
	PRIMARY KEY (ID)
);

CREATE TABLE ORDERDETAILS(
	ID INT NOT NULL,
	ORDERID INT NOT NULL,
	PRODUCTID INT NOT NULL,
	QTY INT NOT NULL,
	PRICE INT NOT NULL,
	PRIMARY KEY(ID)
);