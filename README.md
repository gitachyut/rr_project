# Riverrun Digital Project

Riverrun Digital's Web Development Skill Test </br>

## A custom MVC framework build for this project. </br>

Used libraries (like Formvalidation,CSRF,Pagination etc. ) are custom.<br>

### Illuminate\\Database package is used For Database connectivity and query building.

# Initial Setup
-> /app/config/config.php


# Some reserve keyword
page - can't use 'page' as controller or method.

# must need to use
-> password field name should be 'password' and password confirm filed should be named as 'confirm_password'<br>
-> Database can be access using DB::static_query_building_method_chaining<br>
-> Csrf::csrf_token() is used to generate csrf token.<br>
<hr>
