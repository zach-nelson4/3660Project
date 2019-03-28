create table cars
(
    CarID int,
    New/Used bool,
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

create table oldcarpurchase
(
	OldCarPurchID int,
	CarID int,
	BookP float,
	PricePaid float,
	MilesUsed float,
	Seller/DealerName char(15),
	Location varchar(20),
	primary key (OldCarPurchID),
	foreign key (CarID)
);

create table newcarpurchase
(
	NewCarPurchID int,
	CarID int,
	PurchP float,
	ExpMiles float,
	primary key (NewCarPurchID),
	foreign key (CarID)
);

create table repair
(
	CarID int,
	EstCost float,
	ActualCost float,
	Problem varchar(50),
	RepairID int
	foreign key (CarID)
);


create table salestrans
(
	SalesTransID int,
	CarID int,
	SellingP float,
	DownPmt float,
	FinancedAmt float,
	InterestRate float,
	primary key (SalesTransID),
	foreign key (CarID)
);

create table employee
(
	EmpID int,
	fName char(20),
	lName char(20),
	Phone char(14),
	Commission float,
	primary key (EmpID),
	foreign key (SalesTransID)
);

create table warranty
(
	SalesTransID int,
	Type varchar(20),
	Deductible float,
	StartDate date,
	ItemsCovd varchar(50),
	Length varchar(40),
	TotalCost float,
	MonthlyCost float,
	WarrID int,
	primary key (SalesTransID)
);

create table employerhist 
(
	CustID int,
	EmployerName varchar(20),
	Title char(10),
	Supervisor varchar(20),
	Phone char(14),
	Address varchar(50),
	StartDate date,
	EmpHistID int,
	primary key (CustID)
);

create table payment
(
	CustID int,
	NoPmt int,
	Amount float,
	StartDate date,
	DueDate char(7),
	NoDaysLate float,
	AvgDaysLate float,
	BankAcct int,
	Cosigner char(20),
	PmtID int,
	primary key (CustID)
);
	



