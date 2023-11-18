CREATE TABLE Users(
	ID INT NOT NULL IDENTITY(1,1),
	username varchar(50),
	password varchar(50),
	PRIMARY KEY(ID)	
)

insert into users(username,password) values('tester1','tes123')
select * from users