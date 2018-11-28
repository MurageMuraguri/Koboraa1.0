CREATE DATABASE koboraa;
USE koboraa;

CREATE TABLE users(
userID int(5) not null auto_increment,
firstName varchar(50) not null,
lastName varchar (50) not null,
userMail varchar(50) not null,
userPass varchar(50) not null,
 primary key (userID)
);

CREATE TABLE building(
    buildingID int(5) not null auto_increment,
    buildID varchar(50) not null,
    buildingName varchar(90) not null,
    buildingCity varchar(20) not null,
    buildingEstate varchar(20) not null,
    ownerID int(5) not null,
    roomCapacity int(3) not null,
    caretakerName varchar(50),
    caretakerNo   int(11),
    primary key (buildingID)
);


CREATE TABLE tenant(
    tenantID int(5) not null auto_increment,
    tenantName varchar(90) not null,
    tenantPhone int(10) not null,
    tenantEmail varchar(20) not null,
    buildingID int(5) not null,
    ownerID int(5) not null,
    rentalNumber varchar(10),
    payStatus int(2) DEFAULT 0,
    primary key (tenantID)
);

CREATE TABLE complaint(
    complaintID int(5) not null auto_increment,
    complaint text not null,
    complaintTime bigint(10) not null,
    buildID varchar(15) not null,
    buildingID int(5) not null,
    ownerID int(5) not null,
    buildingName varchar(90) not null,
    status int(2) DEFAULT 0,
    primary key (complaintID)
);


CREATE TABLE prePay(
    ID int(5) not null auto_increment,
    transactionID varchar(20) not null,
    buildID varchar(15) not null,
    buildingID int(5) not null,
    ownerID int(5) not null,
    buildingName varchar(90) not null,
    confirm int(2) DEFAULT 0,
    primary key (ID)
);