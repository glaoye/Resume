<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link rel='stylesheet' href='css/contact.css'>
  </head>
  <header>
    <button><a href="index.html">Resume</a></button>||<button><a href="values.html">My Values</a></button>||<button><a href="bestwork.html">Best Work</a></button>||<button><a href="contact.php">Contact</a></button>
    <h1>Contact</h1>
  </header>
  <body>
    <div class="container">
      <form method='post' action="<?= $_SERVER['PHP_SELF'];?>">
<!-- action will not be executed here, but ina conditional statement on top of html
the current action sends page to itself-->
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">

        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">

        <label for="company">Company</label>
        <input type="text" id="company" name="lastname" placeholder="Your company (if applicable)">

        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

        <input type="submit" value="Submit">

      </form>
    </div>
  </body>
</html>