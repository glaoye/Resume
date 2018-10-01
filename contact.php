<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link href="https://fonts.googleapis.com/css?family=Abel|Arapey|Comfortaa|Merriweather:400,400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    <link rel='stylesheet' href='css/contact.css'>
  </head>

  <body>
    <div class='content'>
    <header>

          <button><a href="index.html">Resume</a></button>||<button><a href="values.html">My Values</a></button>||<button><a href="bestwork.html">Best Work</a></button>||<button><a href="contact.php">Contact</a></button>
          <h1>Contact Me!</h1>

    </header>


    <section class='contactform'>

        <div class="container">
          <form method='post' action="<?= $_SERVER['PHP_SELF'];?>">
    <!-- action will not be executed here, but ina conditional statement on top of html
    the current action sends page to itself-->
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your first name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">

            <label for="company">Email</label>
            <input type="text" id="email" name="email" placeholder="Your email...">

            <label for="company">Company</label>
            <input type="text" id="company" name="company" placeholder="Your company... (optional)">

            <label for="country">Message Type</label>
              <select id="mtype" name="messagetype" placeholder='Select from options...'>
                <option value='noselection'>Select from...</option>
                <option value="query">Query</option>
                <option value="comment">Comment</option>
                <option value="request">Request</option>
                <option value="suggestion">Suggestion</option>
                <option value="other">Other</option>
              </select>

            <label for="subject">Message Details<label>
            <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>

            <input type="submit" value="Submit">

          </form>
        </div>
  </section>
</div>
  </body>
</html>
