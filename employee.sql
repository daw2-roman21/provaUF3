CREATE TABLE Employee( 
    id int PRIMARY KEY, 
    first_name varchar(15), 
    last_name varchar(20), 
    age int, 
    address varchar(30), 
    city varchar(20) 
); 

INSERT INTO Employee (ID,first_name,last_name,age,address,city )VALUES (
    100,
    "EmpleadoAMano",
    "Apellido Nuevo",
    "999",
    "Direccion999",
    "Ciudad999"
)

INSERT INTO Employee("id", "first_name", "last_name", "age", "address", "city") VALUES (100, 'NOMBREM', 'APELLIDOM', 999, 'DIRECCIONM', 'CIUDADM');