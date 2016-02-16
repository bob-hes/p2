# P2 - XKCD Password Generator

Live Site: [p2.bobsaludo.me](http://p2.bobsaludo.me)


<!-- [Video Demo]() -->

The Password Generator comes from this [xkcd comic strip](http://xkcd.com/936/) by Randall Munroe. Randall argues that complicated short passwords (where letters are replaced by numbers and special characters) are easier to crack than easier-to-remember longer passphrases.

The PHP file structure is more complicated for something really simple. However, it was done with more complicated and pedantic forms in mind for maybe the final project. Aspects of the file structure are:

* Easy to repopulate a form from possibly a previous session.
* Unify the way to check each form field needing their unique validation requirements.
* Have the validator be able to keep track of every invalid field and point it out to the user instead of the validator throwing an exception at the first invalid value.

Components of the password generator (GeneratorSettings class, and the InputValidator class) are flexible and easy to reedit and reuse in other form validations. What this means is each object is responsible for 1 job only, and adding other form fields and validation tests is as simple as inserting the new field name into the array GeneratorSettings->$conf as well as inserting a validator into the InputValidator.

Also, with the FormRepopulator, if it were to be extended, forms would be easier to repopulate. Instead of messy form repopulation as:

```php
<input type="text" name="firstname" value="<?php if(!empty($_GET[\"firstname\"])) echo $_GET[\"firstname\"];" ?> />
```

Form repopulation becomes simply:

```php
<?php $fr = new FormRepopulater($_GET);?>

...

<input <?php $fr->text("firstname"); ?> />
```


List of "Today I Learn" (TIL) from coding this project:
* Variable variables - you can make strings into variable names.
.* So, if $myvar = "earth", you can run $$myvar = "ground", and now $earth === "ground.
* Methods can also be called by variable variables.
* Magic Methods __get and __set can add more control to accessing object properties when the properties are accessed in a somewhat similiar manner.
.* Since all properties could potentially be validated, but have different validation requirements, I used __set to check if there are any validation tests on the form field.
* There seems to be a fatal error from trying to require a file name "Validator.php". Might need to check on that later.

<!-- Dependencies -->