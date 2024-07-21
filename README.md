# Musical-World
Musical World is a web application that basically alow user to ulpoad their own songs and can listen to already uploaded songs and can add their song into favorite list.
This project contains admin side as well as user side.
User has to first register to the portal before uploading songs.
The account verification mechanism have been included in the project to verify user authentication.

*create database named "musical_world" at back-end and import the code tables.sql file inside databse folder to get access to database*

This is basically my DBMS mini project.
The site basically includes triggers and procedures.
So before running the application create a trigger and a procedure at back-end(xampp or wamp any application).

Code for triggers and procedure are given below.

****Trigger code****

*trigger to keep track of user contributions*
```mysql
CREATE TRIGGER `IncrementCount` AFTER INSERT ON `upload_albums`
 FOR EACH ROW update user set user.contributions = user.contributions + 1 where new.singer_id = user.user_id
 ```
 ****procedure code****
 
 *stored procedure to upload songs*
 ```mysql
 DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `uploadsongs`(IN `singer_id` INT(11), IN `song_name` VARCHAR(255), IN `song_format` VARCHAR(255), IN `singer_name` VARCHAR(255), IN `song_image` VARCHAR(255), IN `audio_file` VARCHAR(255))
    NO SQL
INSERT INTO upload_albums(`singer_id`,`song_name`,`song_format`,`singer_name`,`song_image`,`audio_file`) VALUES(singer_id,song_name,song_format,singer_name,song_image,audio_file)$$
DELIMITER ;
```
```
Admin Panel Username and Password
username:admin@gmail.com
password:sujith123
```
#  Note: do not forget to add your email credentials validate.php and activate_email.php file so as to send email notifications

## [Download project report here](https://bit.ly/3WuzylB)


Some Glimps....

![screenshot 56](https://user-images.githubusercontent.com/38497682/52524811-476dc100-2cc7-11e9-9269-acc1bf00997c.png)


![screenshot 57](https://user-images.githubusercontent.com/38497682/52524822-610f0880-2cc7-11e9-8ad6-ff56945583d0.png)


![screenshot 61](https://user-images.githubusercontent.com/38497682/52524832-80a63100-2cc7-11e9-902a-62b0b52d14a1.png)


