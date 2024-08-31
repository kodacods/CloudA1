-- Create the reservations table
CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    party_size INT NOT NULL,
    reservation_date DATE NOT NULL,
    reservation_time TIME NOT NULL,
    table_number INT,
    special_requests TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create an index on reservation_date and reservation_time for faster lookups
CREATE INDEX idx_reservation_datetime ON reservations (reservation_date, reservation_time);

-- Insert some sample data
INSERT INTO reservations (customer_name, phone_number, party_size, reservation_date, reservation_time, table_number) VALUES
('Stella yan', '111-1234', 4, CURDATE(), '19:00:00', 5),
('Jane Eyre', '111-5678', 2, CURDATE() + INTERVAL 1 DAY, '20:00:00', 3),
('Edward Rochester', '111-9876', 6, CURDATE() + INTERVAL 2 DAY, '18:30:00', 8);