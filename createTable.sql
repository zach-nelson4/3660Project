create table cars
(
    CarID int not null auto_increment,
    New_or_Used varchar(5),
    ModName varchar(10),
    EdName char(2),
    Year int,
    IntCol varchar(25),
    ExtCol varchar(25),
    VIN varchar(17),
    primary key (CarID)
);

create table customer
(
    CustID int not null auto_increment,
    fName varchar(15),
    lName varchar(20),
    streetName varchar(30),
    city varchar(20),
    province varchar(20),
    postCode char(7),
    phone char(14),
	DOB date,
	gender char(1),
	SalesTransID int,
    primary key (custID),
	foreign key (SalesTransID) REFERENCES salestrans(SalesTransID)
);

create table oldcarpurchase
(
	OldCarPurchID int not null auto_increment,
	CarID int,
	BookP float(2),
	PricePaid float(2),
	MilesUsed int,
	Seller_or_DealerName varchar(20),
	Locations varchar(20),
	primary key (OldCarPurchID),
	foreign key (CarID) REFERENCES cars(CarID)
);

create table newcarpurchase
(
	NewCarPurchID int not null auto_increment,
	CarID int,
	PurchP float(2),
	ExpMiles int,
	primary key (NewCarPurchID),
	foreign key (CarID) REFERENCES cars(CarID)
);

create table repair
(
	CarID int,
	EstCost float(2),
	ActualCost float(2),
	Problem varchar(50),
	RepairID int not null auto_increment,
	primary key (RepairID),
	foreign key (CarID) REFERENCES cars(CarID)
);

create table salestrans
(
	SalesTransID int not null auto_increment,
	CarID int,
	SellingP float(2),
	DownPmt float(2),
	FinancedAmt float(2),
	InterestRate float(2),
	transDate date,
	primary key (SalesTransID),
	foreign key (CarID) REFERENCES car(CarID)
);

create table employee
(
	EmpID int not null auto_increment,
	fName varchar(20),
	lName varchar(20),
	Phone char(14),
	Commission float(2),
	SalesTransID int,
	primary key (EmpID),
	foreign key (SalesTransID) REFERENCES salestrans(SalesTransID)
);

create table warranty
(
	SalesTransID int,
	Type_of_warranty varchar(20),
	Deductible float(2),
	StartDate date,
	ItemsCovd varchar(50),
	Duration varchar(40),
	TotalCost float(2),
	MonthlyCost float(2),
	WarrID int not null auto_increment,
	primary key (WarrID),
	foreign key (SalesTransID) REFERENCES salestrans(SalesTransID)
);

create table employerhist 
(
	CustID int,
	EmployerName varchar(20),
	Title varchar(10),
	Supervisor varchar(20),
	Phone char(14),
	Home_Address varchar(50),
	StartDate date,
	EmpHistID int not null auto_increment,
	primary key (EmpHistID),
	foreign key (CustID) REFERENCES customer(CustID)
);

create table payment
(
	CustID int,
	NoPmt int,
	Amount float(2),
	StartDate date,
	DueDate date,
	NoDaysLate float(2),
	AvgDaysLate float(2),
	BankAcct int,
	Cosigner varchar(30),
	PmtID int not null auto_increment,
	primary key (PmtID),
	foreign key (CustID) REFERENCES customer(CustID)
);
	



