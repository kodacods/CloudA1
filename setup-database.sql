DROP TABLE IF EXISTS bookings;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS tables;

CREATE TABLE bookings (
  customer_id INT AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  PRIMARY KEY (customer_id)
);


INSERT INTO bookings (first_name, last_name) VALUES 
('Jane', 'Eyre'),
('Edward', 'Rochester');