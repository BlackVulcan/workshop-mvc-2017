<!-- Documentation -->
# Documentation

### Eloquent (ORM). Used for things such as querying data.
* https://laravel.com/docs/5.4/eloquent

### Smarty (Templating engine). Used to display variables in the views.
* Variables: http://www.smarty.net/docs/en/language.syntax.variables.tpl
* For loop: http://www.smarty.net/docs/en/language.function.for.tpl#idp35225872
* For each loop: http://www.smarty.net/docs/en/language.function.foreach.tpl

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
Controllers usually fetch the data from what the Model returns and then sends the data to the View. Sort of like an intermediate class.

### Add a new Controller
* Go to the controllers/ folder
* Create a new file. Name it however you want (though there are certain naming conventions like PostController.php or UserController.php)
* Open the file with `<?php` . You don't need to close the php tags.
* Add the following: `namespace Controllers;` and `use Framework\Http\View;` . These are basically import statements. It says that your file is now part of the Controllers namespace and that you can use the View.php class in the `Framework\Http` namespace. It's a convention that namespaces correspond to the folder structure.
* You can now make the new class with the functions in it (the one you specified in the routes.php)

<!-- Models -->
# Models
Models communicate between the database and controllers. They usually contain (business) logic like database queries. in the context of MVC's for the web.
Most frameworks usually use ORM's (Object Relational Mapping). They bind your recently created model to your database table. With ORM's you don't have to write all queries yourself, the ORM does this for you. This means that you can get all rows from the "users" table by typing something like `User::all()`. This depends on the ORM, as there are a lot of different ORM's just like there are different PHP frameworks. If you want, you can overwrite most functionality in your Model.

### Add a new Model
* Go to the models/folder
* Create a new file. Name it however you want (though it's strongly recommended to give it the Singular name of your database table (Model: User.php for table "users" for example)
* Open the file with `<?php` . You don't need to close the php tags.
* Add the following: `namespace Models;` and `use Framework\Model\Model;` . Name the class the same as the name of the file. Then add extend the Model. (Example: `class User extends Model`)
* You now have a model you can use in your controller. Don't forget to import the Model in the Controller. (Example: add `use Models\User;` in your controller)

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
