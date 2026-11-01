-- Library Management System (MySQL). Import this in phpMyAdmin.
CREATE DATABASE IF NOT EXISTS library_db;
USE library_db;

DROP TABLE IF EXISTS borrowings;
DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS students;
DROP TABLE IF EXISTS admins;

CREATE TABLE students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  roll_no VARCHAR(30),
  department VARCHAR(30),
  semester INT,
  password VARCHAR(50)
);

CREATE TABLE books (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150),
  author VARCHAR(100),
  category VARCHAR(50),
  isbn VARCHAR(20),
  copies INT,
  available INT
);

CREATE TABLE borrowings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT,
  book_id INT,
  borrow_date VARCHAR(10),
  due_date VARCHAR(10),
  return_date VARCHAR(10) NULL
);

CREATE TABLE admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(50)
);

INSERT INTO admins (username, password) VALUES ('admin', 'admin123');

INSERT INTO students (name, roll_no, department, semester, password) VALUES
('Aarav Sharma', '36442724010', 'BCA', 5, 'pass123'),
('Priya Das', '36442724011', 'BCA', 3, 'pass123'),
('Rohan Mukherjee', '36442724025', 'BBA', 4, 'pass123'),
('Sneha Banerjee', '36442724031', 'BSc', 2, 'pass123'),
('Arjun Singh', '36442724044', 'BCA', 5, 'pass123'),
('Ananya Gupta', '36442724052', 'BBA', 6, 'pass123');

INSERT INTO books (title, author, category, isbn, copies, available) VALUES
('Let Us C', 'Yashavant Kanetkar', 'Programming', '9788183331630', 5, 5),
('PHP & MySQL: Server-side Web Development', 'Jon Duckett', 'Programming', '9781119149224', 3, 3),
('Database System Concepts', 'Abraham Silberschatz', 'Database', '9780078022159', 4, 3),
('Wings of Fire', 'A. P. J. Abdul Kalam', 'Biography', '9788173711466', 3, 2),
('Introduction to Algorithms', 'Thomas H. Cormen', 'Computer Science', '9780262033848', 2, 1),
('Python Crash Course', 'Eric Matthes', 'Programming', '9781593279288', 4, 4),
('Clean Code', 'Robert C. Martin', 'Programming', '9780132350884', 3, 2),
('Discrete Mathematics', 'Kenneth H. Rosen', 'Mathematics', '9780073383095', 3, 3),
('Operating System Concepts', 'Abraham Silberschatz', 'Computer Science', '9781118063330', 4, 4),
('Computer Networks', 'Andrew S. Tanenbaum', 'Computer Science', '9780132126953', 3, 3),
('Atomic Habits', 'James Clear', 'Self Help', '9781847941831', 5, 5),
('The Alchemist', 'Paulo Coelho', 'Fiction', '9780061122415', 2, 2);

-- Active: book 3, 5, 7, 4 (available above already reduced). Row 3 is overdue.
INSERT INTO borrowings (student_id, book_id, borrow_date, due_date, return_date) VALUES
(1, 1, '2026-10-01', '2026-10-15', '2026-10-12'),
(2, 2, '2026-10-05', '2026-10-19', '2026-10-18'),
(3, 3, '2026-10-10', '2026-10-24', NULL),
(1, 5, '2026-10-28', '2026-11-11', NULL),
(4, 7, '2026-10-30', '2026-11-13', NULL),
(5, 4, '2026-10-20', '2026-11-03', NULL),
(2, 11, '2026-09-20', '2026-10-04', '2026-10-02');
