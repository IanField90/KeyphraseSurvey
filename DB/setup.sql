
/*DROP TABLE ENTRIES;*/
CREATE TABLE entries(
	entry_id MEDIUMINT,
	corpus_title VARCHAR(50),
	corpus_body VARCHAR(12500),
	a1 VARCHAR(50),
	a2 VARCHAR(50),
	a3 VARCHAR(50),
	a4 VARCHAR(50),
	a5 VARCHAR(50),
	b1 VARCHAR(50),
	b2 VARCHAR(50),
	b3 VARCHAR(50),
	b4 VARCHAR(50),
	b5 VARCHAR(50),
	c1 VARCHAR(50),
	c2 VARCHAR(50),
	c3 VARCHAR(50),
	c4 VARCHAR(50),
	c5 VARCHAR(50)
);

/*DROP TABLE SELECTIONS;*/
CREATE TABLE selections(
	selection_id MEDIUMINT,
	entry_id MEDIUMINT,
	user_ip VARCHAR(12),
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
	c5 BOOLEAN
);

ALTER TABLE entries ADD PRIMARY KEY (entry_id), MODIFY COLUMN entry_id MEDIUMINT AUTO_INCREMENT;

ALTER TABLE selections ADD PRIMARY KEY (selection_id), ADD CONSTRAINT selection_fk FOREIGN KEY (entry_id) REFERENCES entries(entry_id) ON DELETE CASCADE,
	MODIFY COLUMN selection_id MEDIUMINT AUTO_INCREMENT;

INSERT INTO entries(corpus_title, corpus_body, a1, a2, a3, a4, a5, b1, b2, b3, b4, b5, c1, c2, c3, c4, c5)
	VALUES('Article 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla imperdiet euismod elementum. Suspendisse non vehicula tortor. Vivamus sed tellus sapien. Duis dolor ante, molestie et iaculis vitae, feugiat eu tortor. Maecenas vitae dui eget leo viverra consequat. Phasellus purus diam, ullamcorper vitae adipiscing quis, congue porttitor lorem. Aenean gravida ultrices laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut elit enim, cursus at dapibus vitae, suscipit vitae arcu. Curabitur ac felis a nunc cursus bibendum ac eu risus. Mauris tincidunt lobortis ante, id fermentum est faucibus vitae. Pellentesque quis nunc ac elit volutpat feugiat. Nulla tristique sollicitudin congue. Aliquam pretium, diam sit amet convallis dictum, risus nisi consectetur leo, eget vulputate dui ipsum sed sem. Vestibulum in purus augue. Quisque tincidunt dapibus fermentum. In semper ornare pulvinar. Morbi rutrum nulla eu odio tempus placerat.', "Bravo", "Alpha", "Charlie", "Delta", "Echo", "Foxtrot", "Golf", "Hotel", "Indigo", "Juliette", "Kilo", "Leema", "Mike", "November", "Oscar");
	
INSERT INTO entries(corpus_title, corpus_body, a1, a2, a3, a4, a5, b1, b2, b3, b4, b5, c1, c2, c3, c4, c5)
		VALUES('Article 2', 'Morbi at ante ut dui sagittis tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eleifend nibh sit amet urna rhoncus bibendum. Donec non massa at turpis lacinia euismod. In vehicula hendrerit justo at adipiscing. Fusce suscipit consequat velit, et aliquet lorem accumsan nec. Vestibulum euismod, tortor ac luctus ornare, erat metus cursus risus, vel semper orci lectus ut leo. Proin neque nisi, tincidunt sed facilisis sed, rutrum vel sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam rutrum tempus nulla, sit amet pulvinar tellus accumsan a. Ut condimentum luctus eros at commodo. Aenean eleifend, velit sit amet fermentum bibendum, eros lectus rutrum ligula, vel iaculis purus mauris eget nisi. Cras est neque, malesuada ultrices scelerisque quis, pretium quis enim. Proin sit amet lorem id felis fringilla dapibus vitae vel diam. Sed hendrerit pharetra imperdiet.', "Charlie", "Alpha", "Bravo", "Delta", "Echo", "Foxtrot", "Golf", "Hotel", "Indigo", "Juliette", "Kilo", "Leema", "Mike", "November", "November");