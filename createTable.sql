create table cars
(
    CarID int,
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
    CustID int,
    fName varchar(15),
    lName varchar(20),
    streetName varchar(30),
    city varchar(20),
    province varchar(20),
    postCode char(7),
    phone char(14),
	SalesTransID int,
    primary key (custID),
	foreign key (SalesTransID) REFERENCES salestrans(SalesTransID)
);

create table oldcarpurchase
(
	OldCarPurchID int,
	CarID int,
	BookP float(2),
	PricePaid float(2),
	MilesUsed float(2),
	Seller_or_DealerName varchar(20),
	Locations varchar(20),
	primary key (OldCarPurchID),
	foreign key (CarID) REFERENCES cars(CarID)
);

create table newcarpurchase
(
	NewCarPurchID int,
	CarID int,
	PurchP float(2),
	ExpMiles float(2),
	primary key (NewCarPurchID),
	foreign key (CarID) REFERENCES cars(CarID)
);

create table repair
(
	CarID int,
	EstCost float(2),
	ActualCost float(2),
	Problem varchar(50),
	RepairID int,
	primary key (RepairID),
	foreign key (CarID) REFERENCES cars(CarID)
);


create table salestrans
(
	SalesTransID int,
	CarID int,
	SellingP float(2),
	DownPmt float(2),
	FinancedAmt float(2),
	InterestRate float(2),
	primary key (SalesTransID),
	foreign key (CarID) REFERENCES car(CarID)
);

create table employee
(
	EmpID int,
	fName char(20),
	lName char(20),
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
	WarrID int,
	primary key (WarrID),
	foreign key (SalesTransID) REFERENCES salestrans(SalesTransID)
);

create table employerhist 
(
	CustID int,
	EmployerName varchar(20),
	Title char(10),
	Supervisor varchar(20),
	Phone char(14),
	Home_Address varchar(50),
	StartDate date,
	EmpHistID int,
	primary key (EmpHistID),
	foreign key (CustID) REFERENCES customer(CustID)
);

create table payment
(
	CustID int,
	NoPmt int,
	Amount float(2),
	StartDate date,
	DueDate char(7),
	NoDaysLate float(2),
	AvgDaysLate float(2),
	BankAcct int,
	Cosigner char(20),
	PmtID int,
	foreign key (CustID) REFERENCES customer(CustID)
);
	



