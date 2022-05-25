DROP database  IF EXISTS Car;
create database Car ;

use Car ;

CREATE TABLE Client
(
  idClient VARCHAR(10) NOT NULL,
  fName VARCHAR(25) NOT NULL,
  lName VARCHAR(25) NOT NULL,
  phone CHAR(10),
  street VARCHAR(30) ,
  city VARCHAR(30) ,
  job VARCHAR(20) NOT NULL,
  PRIMARY KEY (idClient)
);

CREATE TABLE Car
(
  immat CHAR(10) NOT NULL,
  brand VARCHAR(20) NOT NULL,
  model VARCHAR(20) NOT NULL,
  priceByDay FLOAT NOT NULL,
  PRIMARY KEY (immat)
);

CREATE TABLE Rental
(
  rentalID INT NOT NULL AUTO_INCREMENT,
  locDate DATE NOT NULL,
  sDate DATE NOT NULL,
  eDate DATE NOT NULL,
  rentalType CHAR(2) NOT NULL,
  immat CHAR(10) NOT NULL,
  idClient VARCHAR(10) NOT NULL,
  PRIMARY KEY (rentalID) ,
  FOREIGN KEY (immat) REFERENCES Car(immat),
  FOREIGN KEY (idClient) REFERENCES Client(idClient)
);

CREATE TABLE Sale
(
  idClient VARCHAR(10) NOT NULL,
  immat CHAR(10) NOT NULL,
  salePrice FLOAT NOT NULL,
  saleDate Date ,
  PRIMARY KEY (idClient,immat),
  FOREIGN KEY (idClient) REFERENCES Client(idClient),
  FOREIGN KEY (immat) REFERENCES Car(immat)
);


INSERT INTO Client (idClient, fName, lName, phone, street, city, job)
VALUES ('000001', 'Ahmed', 'Benaouda', '05555555', 'bougara',  'elharrach','student');

INSERT INTO Client (idClient, fName, lName, phone, street, city, job)
VALUES ('000002', 'Omar', 'Merazka', '05555555','ali koudja',  'kouba','teacher');

INSERT INTO Client (idClient, fName, lName, phone, street, city, job)
VALUES ('000003', 'Hassiba', 'Hadji', '05555555', 'boumendjal',  'achour','engineer');

INSERT INTO Client (idClient, fName, lName, phone, street, city, job)
VALUES ('000004', 'Hocine', 'Benchikou','05555555', 'benboulaid',  'tamanrasset','engineer');

INSERT INTO Client (idClient, fName, lName, phone, street, city, job)
VALUES ('000005', 'Fatima', 'Nafaa','05555555', 'amirouche',  'benaknoun','student');

INSERT INTO Client (idClient, fName, lName, phone, street, city, job)
VALUES ('000006', 'Ali', 'Baba ali','05555555', 'boudiaf',  'bouzarea','student');

INSERT INTO Client (idClient, fName, lName, phone, street, city, job)
VALUES ('000007', 'Amar', 'Mansouri','05555555', 'benMhidi',  'bouzarea','student');

INSERT INTO Client (idClient, fName, lName, phone, street, city, job)
VALUES ('000008', 'Malika', 'Lounes','05555555', 'Didouche',  'bordj elkiffan','teacher');

INSERT INTO Client (idClient, fName, lName, phone, street, city, job)
VALUES ('000009', 'Hocine', 'Haniche','05555555', 'amirouche',  'bab ezzouar','student');

INSERT INTO Client (idClient, fName, lName, phone, street, city, job)
VALUES ('000010', 'Khadidja', 'Boudraa','05555555', 'Abane Ramdane',  'oued smar','teacher');

INSERT INTO Client (idClient, fName, lName, phone, street, city, job)
VALUES ('000011', 'Bilal', 'Tama','05555555', 'krim belcassem',  'tamanrasset','student');

INSERT INTO Client (idClient, fName, lName, phone, street, city, job)
VALUES ('000012', 'Ali', 'Messili','0555555555', 'Chaabani',  'biskra','lawyer');



INSERT INTO Car (immat, brand, model, priceByDay)
VALUES ('000001', 'FORD', 'focus', 4500);

INSERT INTO Car (immat, brand, model, priceByDay)
VALUES ('000002', 'WOLKWAGEN', 'Touran', 4500);

INSERT INTO Car (immat, brand, model, priceByDay)
VALUES ('000003', 'WOLKWAGEN', 'golf', 4500);

INSERT INTO Car (immat, brand, model, priceByDay)
VALUES ('000004', 'MERCEDES', 'E-Class', 8500);

INSERT INTO Car (immat, brand, model, priceByDay)
VALUES ('000005', 'AUDI', 'Q5', 9500);

INSERT INTO Car (immat, brand, model, priceByDay)
VALUES ('000006', 'AUDI', 'Q3', 7500);

INSERT INTO Car (immat, brand, model, priceByDay)
VALUES ('000007', 'SEAT', 'Ibiza', 2000);

INSERT INTO Car (immat, brand, model, priceByDay)
VALUES ('000008', 'SEAT', 'leon', 1500);

INSERT INTO Car (immat, brand, model, priceByDay)
VALUES ('000009', 'Toyota', 'corolla', 4500);

INSERT INTO Car (immat, brand, model, priceByDay)
VALUES ('000010', 'Toyota', 'camry', 7500);

INSERT INTO Car (immat, brand, model, priceByDay)
VALUES ('000011', 'MERCEDES', 'C-Class', 11500);

INSERT INTO Car (immat, brand, model, priceByDay)
VALUES ('000012', 'FORD', 'Mondeo', 8500);


INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-21' , "%d-%m-%y" ), str_to_date('23-03-21' , "%d-%m-%y" ), str_to_date('25-03-21' , "%d-%m-%y" ), 'ND', '000003', '000006' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-21' , "%d-%m-%y" ), str_to_date('23-03-21' , "%d-%m-%y" ), str_to_date('25-03-21' , "%d-%m-%y" ),'ND','000001', '000002' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-21' , "%d-%m-%y" ), str_to_date('23-03-21' , "%d-%m-%y" ), str_to_date('25-03-21' , "%d-%m-%y" ),'WD', '000002', '000003' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-21' , "%d-%m-%y" ), str_to_date('23-03-21' , "%d-%m-%y" ), str_to_date('25-03-21' , "%d-%m-%y" ),'ND', '000003', '000005' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-21' , "%d-%m-%y" ), str_to_date('23-03-21' , "%d-%m-%y" ), str_to_date('25-03-21' , "%d-%m-%y" ),'ND', '000005', '000006' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-21' , "%d-%m-%y" ), str_to_date('23-03-21' , "%d-%m-%y" ), str_to_date('25-03-21' , "%d-%m-%y" ),'WD', '000007', '000002' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-20' , "%d-%m-%y" ), str_to_date('23-01-21' , "%d-%m-%y" ), str_to_date('25-04-21' , "%d-%m-%y" ),'WD', '000008', '000007' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-21' , "%d-%m-%y" ), str_to_date('23-02-21' , "%d-%m-%y" ), str_to_date( '25-05-21' , "%d-%m-%y" ),'WD', '000005', '000003' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-21' , "%d-%m-%y" ),str_to_date( '23-03-20' , "%d-%m-%y" ), str_to_date('25-04-21' , "%d-%m-%y" ),'ND', '000003', '000009' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-21' , "%d-%m-%y" ), str_to_date('23-04-20' , "%d-%m-%y" ), str_to_date('25-06-20' , "%d-%m-%y" ),'WD', '000004', '000010' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat, idClient )
VALUES (str_to_date('20-04-21' , "%d-%m-%y" ), str_to_date('23-03-21' , "%d-%m-%y" ), str_to_date('29-05-21' , "%d-%m-%y" ),'ND', '000007', '000004' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-04-21' , "%d-%m-%y" ), str_to_date('23-03-21' , "%d-%m-%y" ), str_to_date('29-05-21' , "%d-%m-%y" ),'ND', '000004', '000004' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-04-21' , "%d-%m-%y" ), str_to_date('23-03-21' , "%d-%m-%y" ), str_to_date('29-05-21' , "%d-%m-%y" ),'ND', '000010', '000004' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-04-21' , "%d-%m-%y" ), str_to_date('23-03-21' , "%d-%m-%y" ), str_to_date('29-05-21' , "%d-%m-%y" ),'ND', '000004', '000004' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-04-21' , "%d-%m-%y" ), str_to_date('23-03-21' , "%d-%m-%y" ), str_to_date('29-05-21' , "%d-%m-%y" ),'ND', '000004', '000004' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-20', "%d-%m-%y" ), str_to_date('23-04-20', "%d-%m-%y" ), str_to_date('25-06-20', "%d-%m-%y" ),'ND', '000008', '000007' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-20', "%d-%m-%y" ), str_to_date('23-04-20', "%d-%m-%y" ), str_to_date('25-06-20', "%d-%m-%y" ),'ND', '000012', '000012' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-21' , "%d-%m-%y" ), str_to_date('23-03-21' , "%d-%m-%y" ), str_to_date('25-03-21' , "%d-%m-%y" ),'ND','000012', '000002' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-04-21' , "%d-%m-%y" ), str_to_date('23-04-21' , "%d-%m-%y" ), str_to_date('25-05-21' , "%d-%m-%y" ),'ND','000011', '000004' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-03-21' , "%d-%m-%y" ), str_to_date('23-03-21' , "%d-%m-%y" ), str_to_date('25-03-21' , "%d-%m-%y" ),'WD', '000001', '000003' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-01-21' , "%d-%m-%y" ), str_to_date('23-02-21' , "%d-%m-%y" ), str_to_date('25-03-21' , "%d-%m-%y" ),'WD', '000004', '000003' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('12-02-21' , "%d-%m-%y" ), str_to_date('23-02-21' , "%d-%m-%y" ), str_to_date('25-03-21' , "%d-%m-%y" ),'WD', '000008', '000003' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-04-21' , "%d-%m-%y" ), str_to_date('23-04-21' , "%d-%m-%y" ), str_to_date('25-03-21' , "%d-%m-%y" ),'WD', '000010', '000003' );

INSERT INTO Rental ( locDate, sDate, eDate,rentalType, immat,idClient )
VALUES (str_to_date('20-04-21' , "%d-%m-%y" ), str_to_date('23-04-21' , "%d-%m-%y" ), str_to_date('25-03-21' , "%d-%m-%y" ),'WD', '000012', '000011' );






INSERT INTO Sale (idClient, immat, salePrice, saleDate )
VALUES ('000003', '000005', 5000, str_to_date('25-04-21', "%d-%m-%y" ) );

INSERT INTO Sale (idClient, immat, salePrice, saleDate )
VALUES ('000005', '000009', 3000, str_to_date('25-04-21', "%d-%m-%y" ) );

INSERT INTO Sale (idClient, immat, salePrice, saleDate )
VALUES ('000005', '000008', 3000, str_to_date("25-04-21", "%d-%m-%y" ));