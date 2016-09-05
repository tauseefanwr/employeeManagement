=== Application Name ===
Contributors: (Designed and Developed By Md Tausif Anwar)
Tags: comments, spam
Required php version at least: 5.3
Tested up to: 5.6.8

Here is a short description of this application.  

== Description ==

This application is designed to maintain employees data like information of an employee, job title and salary he is gtting.
To login into the application use email as admin@admin.com and password 123456
A few notes about how it works:
1# This application will add an employee in the database, while adding an employee to the database, it will do a validation also to insert
## correct data in the database.
#2 It will list all the employees on one of the page provided in the application.
#3 It has got search feature also which will ask for name of the employee or employee id of the employee 
## Employee id is the primary key of the employee table which is auto increamented and it always be unique.
#4 On listing page of the  employees it has got three buttons under action column which will 
	#4.1 Open the profile page which will show all the detail of an employee.
	#4.2 Edit button will avail the updation of the employee's data.
	#4.3 Delete button will first prompt and it will ask to delete the employee and if ok button is clicked it delete the employee from the database.
#5 When you will click on name it will also open the profile page of the employee showing all the detail of the employee.
#6 There is a form which will help to export the data from the databse in csv



== Installation ==

Installation needs apache server and mysql as database.
All you need to is to install xampp server which consists of apache server and mysql database as well.
After installing the xampp server find a directory named htdocs and create a folder of any name and paste 
all the files of this repository
