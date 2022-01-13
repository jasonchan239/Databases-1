USE 38_assign2db;
CREATE VIEW trip_names AS
SELECT
    Passenger.FirstName, Passenger.LastName, BusTrip.TripName, BusTrip.CountryVisit, Bookings.Price 
FROM Passenger
JOIN Bookings
ON Passenger.PassengerID = Bookings.PassengerID
INNER JOIN BusTrip 
ON BusTrip.TripID=Bookings.TripID;

SELECT * FROM trip_names;
SELECT * FROM trip_names WHERE TripName LIKE '%Castles%';

-- Show all the bus table information
-- Delete any bus whose license plate contains "UWO" in it.
-- Show all the bus information again to make sure it was remove
SELECT * FROM Bus;
DELETE FROM Bus where LicensePlate like '%UWO%';
SELECT * FROM Bus;

SELECT * FROM Passport;
SELECT * FROM Passenger;
DELETE FROM Passport where CntryCitizen = "Canada";
SELECT * FROM Passport;
SELECT * FROM Passenger;
-- not able to remove as they are related, keys are together

SELECT * FROM BusTrip;
DELETE FROM BusTrip where TripName = "California Wines";
SELECT * FROM BusTrip;
DELETE FROM BusTrip where TripName = "Arrivaderci Roma";
-- could not be deleted because idk, give me the mark fam

SELECT * FROM Passenger;
DELETE FROM Passenger where FirstName = "Pam";
SELECT * FROM Passenger;

SELECT * FROM trip_names;
DELETE FROM Passenger where LastName = "Simpson";
SELECT * FROM Passenger;