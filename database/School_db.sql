-- ========================================
-- SCHOOL WEBSITE DATABASE SCHEMA
-- Database: School_db
-- ========================================

-- Create Database (Run this first if database doesn't exist)
CREATE DATABASE IF NOT EXISTS School_db;
USE School_db;

-- ========================================
-- TABLE 1: CONTACT ENQUIRIES
-- Stores all contact form submissions
-- ========================================
CREATE TABLE IF NOT EXISTS contact_enquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15),
    subject VARCHAR(150),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ========================================
-- TABLE 2: FEEDBACK
-- Stores all feedback form submissions
-- ========================================
CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    relation VARCHAR(50) NOT NULL,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    message TEXT NOT NULL,
    photo VARCHAR(255),
    consent TINYINT(1) DEFAULT 0,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ========================================
-- INDEXES FOR BETTER PERFORMANCE
-- ========================================

CREATE INDEX idx_contact_created ON contact_enquiries(created_at);
CREATE INDEX idx_feedback_rating ON feedback(rating);

-- ========================================
-- SAMPLE ADMIN QUERIES (For Reference)
-- ========================================

-- View all pending contact enquiries:
-- SELECT * FROM contact_enquiries WHERE status = 'pending' ORDER BY created_at DESC;

-- View all approved feedback:
-- SELECT * FROM feedback WHERE status = 'approved' ORDER BY rating DESC;

-- Count enquiries by type:
-- SELECT enquiry_type, COUNT(*) as count FROM contact_enquiries GROUP BY enquiry_type;

-- Average feedback rating:
-- SELECT AVG(rating) as average_rating FROM feedback WHERE status = 'approved';
