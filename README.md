#CMPT350 Assignment 2 Part II
##Contact Management System
A simple contact management system with support for basic CRUD operations using both Azure and MySQL databases. 

##Group:
  Name: Ryan LaForge
  NSID: ral362
  Student #: 11137909

  Name: Iain Workman
  NSID: ipw969
  Student #: 11139430

##Testing environment
The website has been tested on
- Firefox 36.0.1 for Linux Mint
- Google Chome 41.0.2272.89 (Official Build) m for Windows.
	Tested on a laptop with windows 8.1.

## Accessing the Example Page
The page can be accessed at 
http://iainandryan350assignment.azurewebsites.net

## Hosting the website locally
In order to host the website code provided locally the Azure database driver is required.
This driver can be found at:
http://php.net/manual/en/ref.pdo-sqlsrv.php

Also, PHP 5.6 was used in the creation of this project.
## Using the Website
### Adding a new Contact
A contact can be added to the system by clicking the green button with a plus symbol in the top left of the nav bar.

### Updating an existing Contact
An existing contact can have their information updated by clicking the green 'Edit' button next to that contact.

### Removing a Contact
A contact can be removed by clicking the red 'Remove' button next to that contact

## Validation
A mixture of client side and server side validation is performed on the input data.

### Client Side
Client side validation is only performed ensuring that the First Name field (which is the only required field) is not empty. The professor indicated that this was sufficient for demonstrating the principle of what would be used.

### Server Side Validation
Server side validation is used to 
1. ensure that the provided information does not contain an Empty First name field.
2. Checks the input for invalid characters. 
3. Checks the input of all fields for invalid or dangerous characters. (dangerous characters being single-quotes, double-quotes, and semi-colons).
4. Ensures that any empty strings are instead saved as nulls in the database.
