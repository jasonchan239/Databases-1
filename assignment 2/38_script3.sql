-- Show the trip names of all the trips from Italy
USE 38_assign2db;
SELECT TripName FROM BusTrip WHERE BusTrip.CountryVisit="Italy";

-- Show the last names of all passengers with no repeats
SELECT DISTINCT LastName FROM Passenger;

-- Show all the data in the bus trip table, but show them in order of their trip names from A to Z;
SELECT * From BusTrip ORDER BY TripName;

-- List the trip name and country and start date of all trips that start after April 30 of 2022.
SELECT TripName, CountryVisit FROM BusTrip WHERE StartDate > '2022-4-30';

-- List the first name, last name and birth date of all citizens of the USA. 
SELECT Passenger.FirstName, Passenger.LastName, Passport.Birthdate FROM Passenger INNER JOIN Passport ON Passenger.PassportNum = Passport.PassportNum WHERE Passport.CntryCitizen="USA";

-- List the trip name and the number of seat available (Capacity of the assigned bus) for that trip for any trips starting between and including April 1, 2022 to Sept 1, 2022 (just check the starting dates, not the ending dates)
SELECT BusTrip.TripName, Bus.Capacity FROM BusTrip INNER JOIN Bus ON BusTrip.LicensePlate = Bus.LicensePlate WHERE BusTrip.StartDate BETWEEN "2022-4-1" AND "2022-9-1";

-- List all the data for both the passport and the passenger for any passenger whose passport has expired or will expire within 1 year from the current date
SELECT * FROM Passenger INNER JOIN Passport ON Passenger.PassportNum = Passport.PassportNum WHERE Passport.ExpDate BETWEEN CURDATE()-100000 AND CURDATE()+10000;

-- List the first name, last name and bus trip name for any trips that anyone whose last name starts with S.
SELECT
    Passenger.FirstName,
    Passenger.LastName,
    BusTrip.TripName
FROM Passenger
JOIN Bookings
ON Passenger.PassengerID = Bookings.PassengerID
INNER JOIN BusTrip 
ON BusTrip.TripID=Bookings.TripID WHERE Passenger.LastName LIKE 'S%';

-- 9. Count the number of passengers taking the Castles of Germany trip. List that total number of passengers and the trip name and trip id. 
SELECT Bookings.TripID, COUNT(TripID)
FROM Bookings
WHERE TripID = "1";

-- 10. List the countries that have trips and total amount of dollars brought in for each country. Each country name should just show up once along with the total.
SELECT 
BusTrip.CountryVisit,
SUM (Bookings.Price)
GROUP BY Bookings.TripID;

-- 11. List the passengers first and last names, citizenship country and the trip name and trip country name of any passengers taking trips in a country that they are NOT a citizen of.
SELECT Passenger.FirstName, Passenger.LastName, Passport.CntryCitizen, BusTrip.TripName, BusTrip.CountryVisit 
FROM Passenger 
INNER JOIN Passport 
ON Passenger.PassportNum = Passport.PassportNum
INNER JOIN Bookings ON Passenger.PassengerID = Bookings.PassengerID Inner Join BusTrip ON Bookings.TripID = BusTrip.TripID WHERE Passport.CntryCitizen != BusTrip.CountryVisit;

-- 12. List the bus trip id and  bus trip name of all bus trips that do not have any passengers yet. 
SELECT BusTrip.TripID, BusTrip.TripName FROM BusTrip LEFT OUTER JOIN Bookings ON BusTrip.TripID = Bookings.TripID WHERE Bookings.PassengerID IS NULL;

-- 13. Figure out which passenger is paying the most amount of money to our company (i.e. spending the most money in total on our trips). If there is a tie for top amount, list all the passengers paying that amount. List the first name, last name, country of citizenship and the total amount of money that passenger is spending.
CREATE VIEW temp AS SELECT Passenger.FirstName, Passenger.LastName, Passport.CntryCitizen, SUM(Bookings.Price) AS "Total" FROM Passenger INNER JOIN Passport ON Passenger.PassportNum = Passport.PassportNum INNER JOIN Bookings ON Passenger.PassengerID = Bookings.PassengerID GROUP BY Bookings.PassengerID HAVING MAX(Bookings.Price);
SELECT FirstName, LastName, CntryCitizen, Total FROM temp WHERE Total = (SELECT MAX(Total) FROM temp);

-- 14. Find the names of any bus trips with bookings but with less than 4 people taking them.
SELECT BusTrip.TripName FROM BusTrip LEFT OUTER JOIN Bookings ON BusTrip.TripID = Bookings.TripID GROUP BY BusTrip.TripID HAVING COUNT(BusTrip.TripID) < 4;

-- 15.
SELECT BusTrip.TripName AS "Bus Trip Name", COUNT(Bookings.TripID) AS "Current Number of Passengers", Bus.LicensePlate AS "Current Bus Assigned License Plate", Bus.Capacity AS "Capacity of Assigned Bus" FROM BusTrip INNER JOIN Bus ON BusTrip.LicensePlate = Bus.LicensePlate LEFT OUTER JOIN Bookings ON BusTrip.TripID = Bookings.TripID GROUP BY BusTrip.TripID HAVING COUNT(Bookings.TripID) > Bus.Capacity;