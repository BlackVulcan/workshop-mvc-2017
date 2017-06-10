<!-- Routes -->
# Routes
Routes are where it all starts in an MVC structure. When someone browses the web and goes to a specific url
the server looks at the routes file. If there is an route that matches that specific url (lets say for example: /users)
then the route uses the controller and the method (function) that are binded to that url.

Code Example:
```
Route::get("/users", UserController::class, "index");
```

So when a user goes to /users, the code that executes is the index() method of the UserController class

### Add a new Route
* Go to the config/ folder and open routes.php
* Define a new route by adding another line of the Route::get() function.
* The routes.php file is documented with more info.

<!-- Controllers -->
# Controllers
@TODO

### Add a new Controller
* Go to the controllers/ folder
* Create a new file. Name it however you want (though there are certain naming conventions like PostController.php or UserController.php)
* open the file with `<?php` . You don't need to close the php tags.
* Add the following: `namespace Controllers;` and `use Framework\Http\View;` . These are basically import statements. It says that your file is now part of the Controllers namespace and that you can use the View.php class in the `Framework\Http` namespace. It's a convention that namespaces correspond to the folder structure.
* You can now make the new class with the functions in it (the one you specified in the routes.php)

<!-- Models -->
# Models
@TODO

### Add a new Model
* @TODO

<!-- Views -->
# Views
Views are basically what the user sees when they look at the webpage in the browser. After the whole routes->controller->model->controller->view cycle, all the data gets processed and represented by the views. Just like a HTML file.

### Add a new View
* Go to the views/folder
* Create a new file. Name it however you want (though there are certain naming conventions)
* Open the file and you can use it like a normal HTML file. When you need to add data you can use something like <?php $data["name"]; ?> still


<!-- Folder Structure -->
# Folder structure

#### config/
The configuration folder. Here you can define the routes or your database settings.

#### controllers/
The controllers are placed inside the controller folder.

#### framework/
All the files that are related to the framework. Not neccesary for you to understand.

#### public/
The files that gets accessed when you go to the website in the browser. (index.php)

#### vendor/
Files from third parties reside in this folder. Modules for example
