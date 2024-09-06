DROP TABLE IF EXISTS bookings;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS tables;
DROP TABLE IF EXISTS users;

CREATE TABLE bookings (
  customer_id INT AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  booking_date DATE NOT NULL,
  booking_time TIME NOT NULL,
  PRIMARY KEY (customer_id),
  CONSTRAINT check_date CHECK (booking_date >= CURDATE())
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

INSERT INTO bookings (first_name, last_name, booking_date, booking_time) VALUES 
('Jane', 'Eyre', CURDATE(), '12:00:00'),
('Edward', 'Rochester', CURDATE(), '12:30:00');

-- Insert a user with a hashed password (password is 'staffpass')
INSERT INTO users (username, password) VALUES 
('staff', SHA2('staffpass', 256));