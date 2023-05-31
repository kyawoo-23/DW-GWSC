<?php 
include('connect.php');

$create ="CREATE TABLE Pitch
(
	Id varchar(30) not null primary key,
	Name varchar(30),
	PitchTypeId int,
	SiteId int,
	ActivityId int,
	Price int,
	StartDate date,
	EndDate date,
	PrimaryImage varchar(30),
	Image varchar(100),
	Description varchar(50),
	IsFeatured bool not null default false,
	Foreign key (PitchTypeId) References PitchType(Id),
	Foreign key (SiteId) References Site(Id),
	Foreign key (ActivityId) References Activity(Id)
)";

$query = mysqli_query($connect, $create);

if($query) {
	echo "<p>Pitch table created successfully</p>";
} 
else {
	echo "<p>Table Fail to create</p>";
}

?>

<!-- $create ="CREATE TABLE Contact
(
	Id varchar(30) not null primary key,
	CustomerId int,
	Email varchar(30),
	Message varchar(100),
	CreatedAt timestamp not null default current_timestamp,
	Foreign key (CustomerId) References Customer(Id)
)"; -->

<!-- $create ="CREATE TABLE Booking
(
	Id varchar(30) not null primary key,
	CustomerId int,
	Email varchar(30),
	Phone varchar(30),
	PitchId int,
	HeadCount int,
	Remark varchar(80),
	CreatedAt timestamp not null default current_timestamp,
	Foreign key (CustomerId) References Customer(Id),
	Foreign key (PitchId) References Pitch(Id)
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

<!-- $create ="CREATE TABLE Review
(
	Id int not null primary key AUTO_INCREMENT,
	SiteId int,
	CustomerId int,
	Rating int,
	Message varchar(50),
	CreatedAt timestamp not null default current_timestamp,
	Foreign key (SiteId) References Site(Id),
	Foreign key (CustomerId) References Customer(Id)
)"; -->

<!-- $create ="CREATE TABLE LocalAttraction
(
	Id int not null primary key AUTO_INCREMENT,
	SiteId int,
	Name varchar(30),
	Description varchar(50),
	Image varchar(30),
	Foreign key (SiteId) References Site(Id)
)"; -->

<!-- $create ="CREATE TABLE Feature
(
	Id int not null primary key AUTO_INCREMENT,
	SiteId int,
	Name varchar(30),
	Foreign key (SiteId) References Site(Id)
)";
 -->

<!-- $create ="CREATE TABLE Customer
(
	Id int not null primary key AUTO_INCREMENT,
	FirstName varchar(30),
	SurName varchar(30),
	Email varchar(30),
	Password varchar(30),
	Phone varchar(30),
	Image varchar(30),
	ViewCount int
)"; -->

<!-- $create ="CREATE TABLE Site
(
	Id int not null primary key AUTO_INCREMENT,
	Name varchar(30),
	Description varchar(50),
	Location varchar(30),
	Latitude varchar(30),
	Longitude varchar(30),
	Rules varchar(80),
	Image varchar(30)
)"; -->

<!-- $create ="CREATE TABLE Admin
(
 	Id int not null primary key AUTO_INCREMENT,
 	Name varchar(30),
 	Email varchar(30),
 	Password varchar(30),
 	Image varchar(30)
)";
 -->

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