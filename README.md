-----------------------PODCAST API REQUIREMENTS------------------------


--------CREATE NEW EPISODE----------

?The User can create 


--------LIST ALL EPISODES-----------

The user can:
? GET individual episodes from the API by appending the URL with the ID e.g. 
? The User can list all episodes in the database by.... 

--------JSON REQUESTS AND RESPONSES----------

A user can interact with the API by using a client application (such as postman) to GET information (that is stored in 
the `posts` and `categories` phpmyadmin tables) about episodes in JSON format. The user must GET this data from 
http://localhost/php_rest_podcast/api/post/read.php/


----------STORING EPISODES------------

The API queries episodes stored in phpMyAdmin tables instead of Amazon S3 or Digital Ocean because I was more familiar with using it, but research has been initiated on both these services. 


-------------TESTS----------------

Postman is a tool that was used for integration testing. It was used to help simulate how a user might interact with the API
e.g GET requests and retrieving data in JSON format


-----------FRAMEWORK--------------

Pure PHP was used in the development process, but thorough research on the Laravel framework is being undertaken to further
expand my technical skillset. 


---------MINIMUM EPISODE ATTRIBUTES---------------

All attributes in the requirements were included as


-------------EXTRAS------------------

Episodes were given categories, which required a seperate table to be installed on the phpMyAdmin 
podcast database. The sql file has been uploaded in this repository. 
