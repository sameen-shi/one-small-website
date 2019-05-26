create table user
(
    name varchar(64) NOT NULL,
    code varchar(255) NOT NULL,
    is_student varchar(255) NOT NULL,
    primary key (name)
);
create table wordnumber
(
    user_name varchar(64) NOT NULL,
    num int,
    primary key(user_name),
    foreign key (user_name) REFERENCES user(name) ON DELETE CASCADE
);
create table wordlist
(
    id int NOT NULL AUTO_INCREMENT,
    user_name varchar(64) NOT NULL,
    en varchar(255),
    ch varchar(255),
    primary key (id),
    foreign key (user_name) REFERENCES user(name) ON DELETE CASCADE
);
create table sentencelist
(
    id int NOT NULL AUTO_INCREMENT,
    user_name varchar(64) NOT NULL,
    sentence varchar(255),
    primary key (id),
    foreign key (user_name) REFERENCES user(name) ON DELETE CASCADE
);
DELIMITER //
CREATE PROCEDURE deny_root(IN test_name varchar(64))
BEGIN 
	IF test_name = 'root' THEN
		SIGNAL SQLSTATE '45001'
			SET MESSAGE_TEXT = "user name can't be root.";
	END IF;
END //
DELIMITER ;
DELIMITER //
CREATE PROCEDURE updatenum(IN test_name varchar(64))
BEGIN
    update wordnumber
    set num=(SELECT COUNT(*) FROM wordlist
    WHERE user_name=test_name)
    where user_name=test_name;
END; //
DELIMITER ;
DELIMITER //
CREATE Trigger deny_illegal BEFORE INSERT ON user
FOR EACH ROW
BEGIN
	CALL deny_root(new.name);
END; //
DELIMITER ;
create VIEW student
    AS SELECT name
          FROM user
          WHERE is_student='yes';


