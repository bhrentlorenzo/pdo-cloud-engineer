CREATE TABLE cloud_engineers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    cloudSpecialization VARCHAR(50) NOT NULL,
    certificationLevel VARCHAR(50) NOT NULL,
    experienceYears INT NOT NULL,
    dateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
