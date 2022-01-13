SHOW DATABASES;
DROP DATABASE IF EXISTS 38_assign2db;
CREATE DATABASE 38_assign2db;
USE 38_assign2db;
SHOW TABLES;
CREATE TABLE Bus(
    LicensePlate CHAR(7) NOT NULL,
    Capacity INT NOT NULL,
    PRIMARY KEY (LicensePlate)
);
CREATE TABLE Passport(
    PassportNum CHAR(4) NOT NULL,
    CntryCitizen CHAR(30) NOT NULL,
    ExpDate DATE NOT NULL,
    Birthdate DATE NOT NULL,
    PRIMARY KEY (PassportNum)
);
CREATE TABLE Passenger(
    PassengerID INT NOT NULL,
    FirstName CHAR(20) NOT NULL,
    LastName CHAR(20) NOT NULL,
    PRIMARY KEY (PassengerID),
    PassportNum CHAR(4) NOT NULL,
    FOREIGN KEY (PassportNum) REFERENCES Passport(PassportNum) ON DELETE CASCADE
);
CREATE TABLE BusTrip(
    TripID INT UNIQUE NOT NULL,
    TripName CHAR(50) NOT NULL,
    StartDate DATE NOT NULL,
    EndDate DATE NOT NULL,
    CountryVisit CHAR(30) NOT NULL,
    LicensePlate CHAR(7) NOT NULL,
    PRIMARY KEY (TripID)
);
CREATE TABLE Bookings(
    PassengerID INT NOT NULL,
    Price INT NOT NULL,
    TripID INT NOT NULL,
    PRIMARY KEY (PassengerID),
    FOREIGN KEY (PassengerID) REFERENCES Passenger(PassengerID) ON DELETE CASCADE
);

SHOW TABLES;
