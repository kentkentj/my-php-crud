CREATE DATABASE phonebook_project; 

use phonebook_project; 


CREATE TABLE phone_book_table ( 
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    date TIMESTAMP, 
    lastname VARCHAR(30) NOT NULL, 
    firstname VARCHAR(30) NOT NULL, 
    address VARCHAR(50) NOT NULL,
    mobile_number VARCHAR(30) NOT NULL,
    home_number VARCHAR(30) NOT NULL
);