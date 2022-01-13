USE 38_assign2db;
SHOW TABLES;
SELECT * FROM Bus;
LOAD DATA LOCAL INFILE 'loaddatafall2021.txt' INTO TABLE Bus
    FIELDS TERMINATED BY ','
;
SHOW WARNINGS;
SELECT * FROM Bus;
SELECT * FROM Passport;
INSERT INTO Passport (PassportNum, CntryCitizen, ExpDate, Birthdate)
VALUES
    ('US10', 'USA', '2025-1-1', '1970-2-19'),
    ('US12', 'USA', '2025-1-1', '1972-8-12'),
    ('US13', 'USA', '2025-1-1', '2001-5-12'),
    ('US14', 'USA', '2025-1-1', '2004-3-19'),
    ('US15', 'USA', '2025-1-1', '2012-9-17'),
    ('US22', 'USA', '2030-4-4', '1950-6-11'),
    ('US23', 'USA', '2018-3-3', '1940-6-24'),
    ('GE11', 'Germany', '2027-1-1', '1970-7-12'),
    ('US88', 'Canada', '2030-2-13','1979-4-25'),
    ('US89', 'Canada', '2022-2-2', '1976-4-8'),
    ('US90', 'Italy', '2020-2-28', '1980-4-4'),
    ('US91', 'Germany', '2030-1-1', '1959-2-2'),
    ('US69', 'USA', '2030-1-1', '1990-2-2')
;
SELECT * FROM Passport;
SELECT * FROM Passenger;
INSERT INTO Passenger (PassengerID, FirstName, LastName, PassportNum)
VALUES
    ('11', 'Homer', 'Simpson', 'US10'),
    ('22', 'Marge', 'Simpson', 'US12'),
    ('33', 'Bart', 'Simpson', 'US13'),
    ('34', 'Lisa', 'Simpson', 'US14'),
    ('35', 'Maggie', 'Simpson', 'US15'),
    ('44', 'Ned', 'Flanders', 'US22'),
    ('45', 'Todd', 'Flanders', 'US23'),
    ('66', 'Heidi', 'Klum', 'GE11'),
    ('77', 'Michael', 'Scott', 'US88'),
    ('78', 'Dwight', 'Schrute', 'US89'),
    ('79', 'Pam', 'Beesly', 'US90'),    
    ('80', 'Creed', 'Bratton', 'US91'),    
    ('89', 'Joe', 'Goldberg', 'US69')   
;
SELECT * FROM Passenger;
SELECT * FROM BusTrip;
INSERT INTO BusTrip (TripID, TripName, StartDate, EndDate, CountryVisit, LicensePlate)
VALUES
    ('1', "Castles of Germany", '2022-1-1', '2022-1-17', 'Germany', 'VAN1111'),
    ('2', "Tuscany Sunsets", '2022-3-3', '2022-3-14', 'Italy', 'TAXI222'),
    ('3', "California Wines", '2022-5-5', '2022-5-10', 'USA', 'VAN2222'),
    ('4', "Beaches Galore", '2022-4-4', '2022-4-14', 'Bermuda', 'TAXI222'),
    ('5', "Cottage Country", '2022-6-1', '2022-6-22', 'Canada', 'CAND123'),
    ('6', "Arrivaderci Roma", '2022-7-5', '2022-7-15', 'Italy', 'TAXI111'),
    ('7', "Shetland and Orkney", '2022-9-9', '2022-9-29', 'UK', 'TAXI111'),
    ('8', "Disney World and Sea World", '2022-6-10', '2022-6-20', 'USA', 'VAN2222'),
    ('9', "Intro to Multimedia and Communications", '2021-9-1', '2022-4-1', 'Middlesex', 'CS_1033'),
    ('10', "Intro to Computer Organization and Architecture", '2021-9-1', '2022-4-1', 'Middlesex', 'CS_2208')
;
SELECT * FROM BusTrip;
SELECT * FROM Bookings;
INSERT INTO Bookings (PassengerID, Price,TripID)
VALUES  
    ('11','500','1'),   
    ('22','500','1'),
    ('33','400','1'),
    ('34','400','1'),
    ('35','400','1'),
    ('66','600.99','1'),
    ('44','400','8'),
    ('45','200','8'),
    ('78','600','4'),
    ('80','600','4'),
    ('78','550','1'),
    ('33','300','8'),
    ('34','300','8'),
    ('11','600','6'),
    ('22','600','6'),
    ('33','100','6'),
    ('34','100','6'),
    ('35','100','6'),
    ('11','300','7'),
    ('44','400','7'),
    ('77','500','7'),
    ('89','100','1')
;
SELECT * FROM Bookings;
SHOW TABLES;
