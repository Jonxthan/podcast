                                                 PODCAST API REQUIREMENTS


--------CREATE NEW EPISODE----------

?The User can create 


--------LIST ALL EPISODES-----------

The user can GET information about all episodes stored in a phpmyadmin database and can be displayed either 'raw'
or 'pretty' using a client application called postman. The user must GET this data from http://localhost/php_rest_podcast/api/post/read.php/ (accessed locally).


--------JSON REQUESTS AND RESPONSES----------

A user can interact with the API by using a client application (such as postman) to GET information (that is stored in 
the `posts` and `categories` phpmyadmin tables) about episodes in JSON format. 

?IN THE PROCESS? The User can also request a specific episode by ID and the API will return information about the episode in JSON format.


----------STORING EPISODES------------

The API queries episodes stored in phpMyAdmin tables instead of Amazon S3 or Digital Ocean because I was more familiar with using it, but research has been initiated on both services. 


-------------TESTS----------------

Postman is a tool that was used for integration testing. It was used to help simulate how a user might interact with the API
e.g GET requests and retrieving data in JSON format


-----------FRAMEWORK--------------

Pure PHP was used in the development process, but thorough research on the Laravel framework is being undertaken to further
expand my technical skillset. 


---------MINIMUM EPISODE ATTRIBUTES---------------

All episode attributes in the requirements were integrated in database tables. 


-------------EXTRAS------------------

?? Can Update episode meta data 
?? Can Delete episode 

Episodes were given categories, which required a seperate table to be installed on the phpMyAdmin 
podcast database. The sql file has been uploaded in this repository. 

---------DESIRABLES--------------

