# ecommerce
This is fully feature ecommerce website developed in core php with esewa payment gateway.

How to use this application ?
Step 1: download the application by using git clone https://github.com/nageshwor011/ecommerce.git or simply download as zipfile
Step 2: Open you htdocs folder  
Step 3: create folder and rename it koshisale .
Step 4:  copy paste the downloaded code in koshisale folder.
Step 5: Create database by running this command in mysql terminal. CREATE DATABASE koshisale;
Step 6: import the koshisale.sql  database file in database that you created just right now.
Here the application will run but to get mail sending system follow below step
Keep patient read it trust me after following this step this application run successfully.

Here I have use the email forwarding so you have to do few setting in you 
How To Send Mail From Localhost XAMPP Using PHP

To send mail from localhost XAMPP using Gmail, configure XAMPP after installing it. Follow the below steps for the same.

Steps to Send Mail From Localhost XAMPP Using Gmail:

Open XAMPP Installation Directory.


Go to C:\xampp\php and open the php.ini file.
Find [mail function] by pressing ctrl + f.
Search and pass the following values:
SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = YourGmailId@gmail.com
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"


Now, go to C:\xampp\sendmail and open the sendmail.ini file.

Find [sendmail] by pressing ctrl + f.
Search and pass the following values
smtp_server=smtp.gmail.com
smtp_port=587 or 25 //use any of them
error_logfile=error.log
debug_logfile=debug.log
auth_username=YourGmailId@gmail.com
auth_password=Your-Gmail-Password
force_sender=YourGmailId@gmail.com(optional)

Here is the actual code that you have to write
Script To Send Mail:

<?php
$to_email = "receipient@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: sender email";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}



**Note: If you are getting a warning message then Please configure “Less secure apps” settings as shown below. Sometimes without turning on the 'less secure apps' is the main reason the user didn't receive the mail.

=> Turning on 'less secure apps' settings as mailbox user

Go to your (Google Account).
On the left navigation panel, click Security.
On the bottom of the page, in the Less secure app access panel, click Turn on access.
If you don't see this setting, your administrator might have turned off less secure app account access (check the instruction above).
Click the Save button.

** Now your email will be sent successfully. After following this step your application run successfully. **
--------------------------------------------HAPPY CODING ----------------------------------------------

The end 

