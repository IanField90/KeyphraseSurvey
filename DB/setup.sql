/*drop table entries;*/
CREATE TABLE entries(
	entry_id MEDIUMINT /*NOT NULL AUTO_INCREMENT PRIMARY KEY*/,
	corpus_title VARCHAR(100),
	corpus_body VARCHAR(2500),
	a1 VARCHAR(100),
	a2 VARCHAR(100),
	a3 VARCHAR(100),
	a4 VARCHAR(100),
	a5 VARCHAR(100),
	b1 VARCHAR(100),
	b2 VARCHAR(100),
	b3 VARCHAR(100),
	b4 VARCHAR(100),
	b5 VARCHAR(100),
	c1 VARCHAR(100),
	c2 VARCHAR(100),
	c3 VARCHAR(100),
	c4 VARCHAR(100),
	c5 VARCHAR(100)
);

/*drop table selections;*/
CREATE TABLE selections(
	selection_id MEDIUMINT /*NOT NULL AUTO_INCREMENT PRIMARY KEY*/,
	entry_id MEDIUMINT,
	user_ip VARCHAR(9),
	selection_time DATETIME,
	a1 BOOLEAN,
	a2 BOOLEAN,
	a3 BOOLEAN,
	a4 BOOLEAN,
	a5 BOOLEAN,
	b1 BOOLEAN,
	b2 BOOLEAN,
	b3 BOOLEAN,
	b4 BOOLEAN,
	b5 BOOLEAN,
	c1 BOOLEAN,
	c2 BOOLEAN,
	c3 BOOLEAN,
	c4 BOOLEAN,
	c5 BOOLEAN /*,
	FOREIGN KEY(entry_id) REFERENCES entries(entry_id)
	*/
);

ALTER TABLE entries ADD PRIMARY KEY (entry_id), MODIFY COLUMN entry_id MEDIUMINT AUTO_INCREMENT;

ALTER TABLE selections ADD PRIMARY KEY (selection_id), ADD CONSTRAINT selection_fk FOREIGN KEY (entry_id) REFERENCES entries(entry_id) ON DELETE CASCADE;

INSERT INTO entries(corpus_title, corpus_body, a1, a2, a3, a4, a5, b1, b2, b3, b4, b5, c1, c2, c3, c4, c5)
	VALUES('Some title', 'This is a random body of text :-)', "Bravo", "Alpha", "Charlie", "Delta", "Echo", "Foxtrot", "Golf", "Hotel", "Indigo", "Juliette", "Kilo", "Leema", "Mike", "November", "Oscar");
	
INSERT INTO entries(corpus_title, corpus_body, a1, a2, a3, a4, a5, b1, b2, b3, b4, b5, c1, c2, c3, c4, c5)
		VALUES('Some title 2', '2 This is another random body of text :-)', "Charlie", "Alpha", "Bravo", "Delta", "Echo", "Foxtrot", "Golf", "Hotel", "Indigo", "Juliette", "Kilo", "Leema", "Mike", "November", "Oscar");