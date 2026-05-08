-- Unified schema for MVC examples
-- Creates one database `wt` with users, todos, products, and contacts tables

CREATE DATABASE IF NOT EXISTS wt DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE wt;

-- users table used for login across all examples (teaching example uses plain-text passwords)
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- sample users (passwords are plain text for the example)
INSERT INTO users (username, password, email, created_at) VALUES
('admin', 'admin123', 'admin@example.com', '2026-04-28 08:30:18'),
('student1', 'pass123', 'student1@example.com', '2026-04-28 08:30:18'),
('john', 'password123', 'john@example.com', '2026-04-28 08:30:18'),
('jane', 'password456', 'jane@example.com', '2026-04-28 08:30:18'),
('adam', '123', 'adam@gmail.com', '2026-04-28 05:04:06');

-- todos table for simple_todo example
CREATE TABLE IF NOT EXISTS todos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  completed TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO todos (title, completed) VALUES
('Buy groceries', 0),
('Read chapter 1', 0),
('Setup PHP environment', 1);

-- products table for product_catalog example
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, price) VALUES
('Notebook', 'College ruled notebook', 2.50),
('Water Bottle', '1L stainless steel', 12.00),
('Pen Set', 'Pack of 5 pens', 3.75);

-- contacts table for contact_book example
CREATE TABLE IF NOT EXISTS contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255),
  phone VARCHAR(50),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO contacts (name, email, phone) VALUES
('Alice Smith', 'alice@example.com', '555-0101'),
('Bob Johnson', 'bob@example.com', '555-0202');

-- Done. To drop and recreate from scratch you can run:
-- DROP DATABASE IF EXISTS wt; -- then re-run this script.
