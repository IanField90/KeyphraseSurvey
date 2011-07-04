CREATE TABLE Entries(
	Entry_ID NUMBER(5) NOT NULL,
	Corpus_Title VARCHAR(100),
	Corpus_Body VARCHAR(2500),
	A1 VARCHAR(100),
	A2 VARCHAR(100),
	A3 VARCHAR(100),
	A4 VARCHAR(100),
	A5 VARCHAR(100),
	B1 VARCHAR(100),
	B2 VARCHAR(100),
	B3 VARCHAR(100),
	B4 VARCHAR(100),
	B5 VARCHAR(100),
	C1 VARCHAR(100),
	C2 VARCHAR(100),
	C3 VARCHAR(100),
	C4 VARCHAR(100),
	C5 VARCHAR(100)
);

CREATE TABLE Selections(
	Selection_ID NUMBER(5) NOT NULL,
	Entry_ID NUMBER(5) NOT NULL,
	User_IP VARCHAR(9),
	Selection_Time DATETIME,
	A1 BOOLEAN,
	A2 BOOLEAN,
	A3 BOOLEAN,
	A4 BOOLEAN,
	A5 BOOLEAN,
	B1 BOOLEAN,
	B2 BOOLEAN,
	B3 BOOLEAN,
	B4 BOOLEAN,
	B5 BOOLEAN,
	C1 BOOLEAN,
	C2 BOOLEAN,
	C3 BOOLEAN,
	C4 BOOLEAN,
	C5 BOOLEAN
);