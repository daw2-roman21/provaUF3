CREATE TABLE logEmployee ( 
    loglevel smallint, 
    effectime TIMESTAMP, 
    operacio VARCHAR(255), 
    idemployee int NOT NULL, 
    first_name varchar(15), 
    last_name varchar(20), 
    age int, 
    address varchar(30), 
    city varchar(20) 
 ); 