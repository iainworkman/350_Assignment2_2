#CMPT350 Assignment 2 Part II
##Contact Management System
A simple contact management system with support for basic CRUD operations using both Azure and MySQL databases. 

##Group:
  Name: Ryan LaForge
  NSID:
  Student #:

  Name: Iain Workman
  NSID: ipw969
  Student #: 11139430

##Testing environment
The website has been tested on
- Firefox 36.0.1 for Linux Mint


## Accessing the Example Page
The page can be accessed at 
http://iainandryan350assignment.azurewebsites.net

## Hosting the website locally
In order to host the website code provided locally the Azure database driver is requried.
This driver can be found at:
http://php.net/manual/en/ref.pdo-sqlsrv.php

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
Server side validation is used to ensure again that the provided information does not contain an Empty First name field. It also checks the input of all fields for invalid or dangerous characters.
