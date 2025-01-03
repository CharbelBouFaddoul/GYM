-- Create the database
CREATE DATABASE if NOT EXISTS GYM CHARACTER SET UTF8;

-- Use the database
USE GYM;

-- Create User table
CREATE TABLE `User` (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    EmailAddress VARCHAR(50) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    DateOfBirth DATE NOT NULL,
    Gender VARCHAR(10) NOT NULL,
    Address VARCHAR(100) NOT NULL,
    PhoneNumber VARCHAR(20) NOT NULL,
    `Height` char(3) NOT NULL,
    `Weight` char(3) NOT NULL
)Engine = InnoDB;

-- Create StaffPosition table
CREATE TABLE StaffPosition (
    PositionID INT PRIMARY KEY AUTO_INCREMENT,
    PositionName VARCHAR(50) NOT NULL
)Engine = InnoDB;

-- Create Personel Trainer table
CREATE TABLE PersonelTrainer (
    PersonelTrainerID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    EmailAddress VARCHAR(50) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    DateOfBirth DATE NOT NULL,
    Gender VARCHAR(10) NOT NULL,
    Address VARCHAR(100) NOT NULL,
    PhoneNumber VARCHAR(20) NOT NULL,
    HireDate DATE NOT NULL,
    CV varchar(255) NOT NULL,
    `Image` varchar(255) NOT NULL,
    TrainingType varchar(30),
    Experience char(2),
    `Description` varchar(200),
    Instagram varchar(60),
    LinkedIn varchar(60),
    FaceBook varchar(60),
    Twitter varchar(60),
    certification tinyint(1) Not NULL
)Engine = InnoDB;



-- Create Membership table
CREATE TABLE Membership (
    MembershipID INT PRIMARY KEY AUTO_INCREMENT,
    MembershipType VARCHAR(50) NOT NULL,
    Description TEXT NOT NULL,
    Price DECIMAL(10, 2) NOT NULL
);

-- Create Membership Enrollment table
CREATE TABLE MembershipEnrollment (
    EnrollmentID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT NOT NULL,
    MembershipID INT NOT NULL,
    StartDate DATE NOT NULL,
    EndDate DATE NOT NULL,
    FOREIGN KEY (UserID) REFERENCES User (UserID) on delete cascade on update cascade,
    FOREIGN KEY (MembershipID) REFERENCES Membership (MembershipID) on delete cascade on update cascade
);

-- Create Schedule table
CREATE TABLE Schedule (
    ScheduleID INT PRIMARY KEY AUTO_INCREMENT,
    ClassName VARCHAR(50) NOT NULL,
    Instructor INT NOT NULL,
    StartTime TIME NOT NULL,
    EndTime TIME NOT NULL,
    DayOfWeek VARCHAR(10) NOT NULL,
    FOREIGN KEY (Instructor) REFERENCES PersonelTrainer (PersonelTrainerID) on delete cascade on update cascade
) Engine = InnoDB;

-- Create Reservation table
CREATE TABLE Reservation (
    ReservationID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT NOT NULL,
    ScheduleID INT NOT NULL,
    ReservationDate DATE NOT NULL,
    FOREIGN KEY (UserID) REFERENCES User (UserID) on delete cascade on update cascade,
    FOREIGN KEY (ScheduleID) REFERENCES Schedule (ScheduleID) on delete cascade on update cascade
) Engine = InnoDB;


-- Create shop table
CREATE TABLE ShopType(
    typeID INT PRIMARY KEY AUTO_INCREMENT,
    `type` varchar(40) NOT NULL
) Engine = InnoDB;

CREATE TABLE Shop(
    shopID INT PRIMARY KEY AUTO_INCREMENT,
    typeID INT,
    `Name` varchar(30) NOT NULL,
    `Price` float(10,2) NOT NULL,
    `Image` LongBlob NOT NULL,
    `Quantity` INT(5) NOT NULL,
    Product_Sold INT(5) NOT NULL,
    FOREIGN KEY (typeID) REFERENCES ShopType(typeID) on delete cascade on update cascade
) Engine = InnoDB;