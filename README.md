# P2 - XKCD Password Generator

Live Site: [p2.bobsaludo.me](http://p2.bobsaludo.me)


<!-- [Video Demo]() -->

The Password Generator comes from this [xkcd comic strip](http://xkcd.com/936/) by Randall Munroe. Randall argues that complicated short passwords (where letters are replaced by numbers and special characters) are easier to crack than easier-to-remember longer passphrases.

The PHP file structure is more complicated for something really simple. However, it was done with more complicated and pedantic web forms in mind (for maybe the final project). The partitioned parts of the project (the classes) were developed from these considerations:

* Easier way to repopulate a form from possibly a previous session.
* Unify way to check each form field needing their unique validation requirements.
* Have the validator be able to keep track of every invalid field and point it out to the user instead of the validator throwing an exception at the first invalid value.

Components of the password generator (GeneratorSettings class, and the InputValidator class) are flexible and easy to reedit and reuse in other web form. Each object is responsible for 1 job, and adding other form fields and validation tests is as simple as inserting the new field name into the array "GeneratorSettings->$conf" as well as inserting a validator into the "InputValidator" class.

Also, with the FormRepopulator, if it were to be extended, forms would be easier to repopulate. Instead of messy form repopulation as:

```php
<input type="text" name="firstname" value="<?php if(!empty($_GET[\"firstname\"])) echo $_GET[\"firstname\"];" ?> />
```

Form repopulation simply becomes:

```php
<?php $fr = new FormRepopulater($_GET);?>

...

<input <?php $fr->text("firstname"); ?> />
```

Tools and Dependencies Used:
* [layoutit.com](http://www.layoutit.com/) for the frontend, which uses [Bootstrap](http://getbootstrap.com/)
* [jQuery](https://jquery.com/) for the Bootstrap. The library is from [Google](https://developers.google.com/speed/libraries/).
* [paulnoll.com](http://www.paulnoll.com/Books/Clear-English/words-01-02-hundred.html) for the word list.
 
Things Wish to Expand on if More Time:
* Automatic copying
* Adding Spanish words
* Adding the ability to try out the methods from the rebuttals to xkcd's proposal
 * [Bruce Schneier's Rebuttal](https://www.schneier.com/blog/archives/2014/03/choosing_secure_1.html#!s!xkcd)
 * [Mark Burnett's Rebuttal](https://web.archive.org/web/20150319220514/https://xato.net/passwords/analyzing-the-xkcd-comic/#.VsWoSpMrLUI)

List of "Today I Learn" (TIL) from coding this project:
* Variable variables - you can make strings into variable names.
 * So, if $myvar = "earth", you can run $$myvar = "ground", and now $earth === "ground.
* Methods can also be called by variable variables.
* Magic Methods __get and __set can add more control to accessing object properties when the properties are accessed in a somewhat similiar manner.
 * Since all properties could potentially be validated, but have different validation requirements, I used __set to check if there are any validation tests on the form field.
* There seems to be a fatal error from trying to require a file name "Validator.php". Might need to check on that later.


