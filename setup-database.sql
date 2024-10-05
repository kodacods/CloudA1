DROP TABLE IF EXISTS bookings;


CREATE TABLE bookings (
  customer_id INT AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  booking_date DATE NOT NULL,
  booking_time TIME NOT NULL,
  PRIMARY KEY (customer_id)
);

INSERT INTO bookings (first_name, last_name, booking_date, booking_time) VALUES 
('Jane', 'Eyre', CURDATE(), '12:00:00'),
('Edward', 'Rochester', CURDATE(), '12:30:00');
