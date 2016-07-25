# Riverrun Digital Project
Riverrun Digital's Web Development Skill Test </br>
## A custom MVC framework build for this project. </br>
Used libraries (like Formvalidation,CSRF etc. ) are custom.<br>
### Illuminate\\Database package is used For Database connectivity and query building.

Setup
# /app/config/config.php


# some reserve key word
page - can't use page name as controller.

# must need to use
-> password field name should be 'password' and password confirm filed should be named as 'confirm_password'
-> Database can be access using DB::static_query_building_method_chaining
-> Csrf::csrf_token() is used to generate csrf token.
