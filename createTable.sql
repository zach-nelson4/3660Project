/*create table cars
(
    CarID int,
    ModName varchar(10),
    EdName char(2),
    Year int,
    IntCol varchar(25),
    ExtCol varchar(25),
    VIN varchar(17),
    primary key (CarID)
);
*/

create table customer
(
    custID int,
    fName varchar(15),
    lName varchar(20),
    streetName varchar(30),
    city varchar(20),
    province varchar(20),
    postCode char(7),
    phone char(14),
    primary key (custID)
);

