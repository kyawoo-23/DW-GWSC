<?php 
include('connect.php');

$create ="CREATE TABLE Booking
(
	Id varchar(30) not null primary key,
	CustomerId int,
	Email varchar(30),
	Phone varchar(30),
	PitchId int,
	HeadCount int,
	Price int,
	Remark text,
	CardType varchar(20),
	CardNumber varchar(20),
	CardExpiry varchar(10),
	CardCvv int,
	CardName varchar(30),
	Address text,
	CreatedAt timestamp not null default current_timestamp,
	Foreign key (CustomerId) References Customer(Id),
	Foreign key (PitchId) References Pitch(Id)
)";

$query = mysqli_query($connect, $create);

if($query) {
	echo "<p>Booking table created successfully</p>";
} 
else {
	echo "<p>Table Fail to create</p>";
}

?>

<!-- $create ="CREATE TABLE Review
(
	Id int not null primary key AUTO_INCREMENT,
	SiteId int,
	CustomerId int,
	Rating int,
	Message text,
	CreatedAt timestamp not null default current_timestamp,
	Foreign key (SiteId) References Site(Id),
	Foreign key (CustomerId) References Customer(Id)
)"; -->

<!-- $create ="CREATE TABLE Customer
(
	Id int not null primary key AUTO_INCREMENT,
	FirstName varchar(30),
	SurName varchar(30),
	Email varchar(30),
	Password varchar(30),
	Phone varchar(30),
	Address text,
	Image text,
	ViewCount int
)"; -->

<!-- $create ="CREATE TABLE LocalAttraction
(
	Id int not null primary key AUTO_INCREMENT,
	SiteId int,
	Name varchar(30),
	Description text,
	Image text,
	Foreign key (SiteId) References Site(Id)
)"; -->

<!-- $create ="CREATE TABLE Pitch
(
	Id varchar(30) not null primary key,
	Name varchar(30),
	PitchTypeId int,
	SiteId int,
	ActivityId int,
	Price int,
	StartDate date,
	EndDate date,
	PrimaryImage text,
	Image text,
	Description text,
	IsAvailable bool not null default true,
	IsFeatured bool not null default false,
	Foreign key (PitchTypeId) References PitchType(Id),
	Foreign key (SiteId) References Site(Id),
	Foreign key (ActivityId) References Activity(Id)
)"; -->

<!-- $create ="CREATE TABLE Admin
(
 	Id int not null primary key AUTO_INCREMENT,
 	Name varchar(30),
 	Email varchar(30),
 	Password varchar(30),
 	Image text
)"; -->

<!-- $create ="CREATE TABLE Site
(
	Id int not null primary key AUTO_INCREMENT,
	Name varchar(30),
	Description text,
	Location varchar(30),
	Map text,
	Rules text,
	Image text
)"; -->

<!-- $create ="CREATE TABLE Feature
(
	Id int not null primary key AUTO_INCREMENT,
	SiteId int,
	FacilitiesId int,
	Foreign key (SiteId) References Site(Id),
	Foreign key (FacilitiesId) References Facilities(Id)
)"; -->

<!-- $create ="CREATE TABLE Facilities
(
	Id int not null primary key AUTO_INCREMENT,
	Name varchar(30)
)"; -->

<!-- $create ="CREATE TABLE Contact
(
	Id varchar(30) not null primary key,
	CustomerId int,
	Email varchar(30),
	Message varchar(100),
	CreatedAt timestamp not null default current_timestamp,
	Foreign key (CustomerId) References Customer(Id)
)"; -->

<!-- $create ="CREATE TABLE Pitch
(
	Id varchar(30) not null primary key,
	Name varchar(30),
	PitchTypeId int,
	SiteId int,
	ActivityId int,
	Price int,
	StartDate date,
	EndDate date,
	Image varchar(100),
	Description varchar(50),
	IsFeatured bool not null default false,
	Foreign key (PitchTypeId) References PitchType(Id),
	Foreign key (SiteId) References Site(Id),
	Foreign key (ActivityId) References Activity(Id)
)"; -->

<!--  $create ="CREATE TABLE PitchType
(
	Id int not null primary key AUTO_INCREMENT,
	Name varchar(30)
)";
 -->

<!--  $create ="CREATE TABLE Activity
(
	Id int not null primary key AUTO_INCREMENT,
	Name varchar(30)
)"; -->