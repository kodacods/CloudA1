-- Drop existing tables if they exist
DROP TABLE IF EXISTS reservations;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS tables;

-- Create tables table
CREATE TABLE tables (
  table_id INT AUTO_INCREMENT,
  capacity INT NOT NULL,
  location VARCHAR(50),
  PRIMARY KEY (table_id)
);

-- Create customers table
CREATE TABLE customers (
  customer_id INT AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  phone VARCHAR(20),
  email VARCHAR(100),
  PRIMARY KEY (customer_id)
);

-- Create reservations table
CREATE TABLE reservations (
  reservation_id INT AUTO_INCREMENT,
  customer_id INT,
  table_id INT,
  reservation_date DATE NOT NULL,
  reservation_time TIME NOT NULL,
  party_size INT NOT NULL,
  special_requests TEXT,
  PRIMARY KEY (reservation_id),
  FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
  FOREIGN KEY (table_id) REFERENCES tables(table_id)
);

-- Insert sample data
INSERT INTO tables (capacity, location) VALUES 
(2, 'Window'),
(4, 'Center'),
(6, 'Patio'),
(8, 'Private Room');

INSERT INTO customers (first_name, last_name, phone) VALUES 
('Jane', 'Eyre', '222-1234'),
('Edward', 'Rochester', '111-5678');

INSERT INTO reservations (customer_id, table_id, reservation_date, reservation_time, party_size, special_requests) VALUES 
(1, 2, '2023-09-15', '19:00:00', 4, 'Anniversary celebration'),
(2, 3, '2023-09-16', '20:00:00', 6, 'Allergic to nuts');