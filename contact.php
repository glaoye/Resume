<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])){
  $expected = ['firstname','lastname','email','company','category','message'];
  $required = ['firstname','lastname','email','category','message'];
  require 'process-mail.php';
}
?>

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
              <?php if($missing):?>
                <p class='warningheading'>Please fill in the required field(s).</p>
              <?php endif; ?>
              <?php if($errors):?>
                <p class='warningheading'>Please fix the following error(s)</p>
              <?php endif; ?>
              <?php if($suspect):?>
                <p class='warningheading'>Sorry, your message was unable to be sent.</p>
              <?php endif; ?>


            <label for="fname">First Name
              <?php if($missing && in_array('firstname', $missing)):?>
                <p class='warning'>Please enter your first name.</p>
              <?php endif; ?>
            </label>
            <input type="text" id="fname" name="firstname" placeholder="Your first name.."
            <?php if($missing||$errors){
              echo "value={$firstname}";}?>>

            <label for="lname">Last Name
              <?php if($missing && in_array('lastname', $missing)):?>
                <p class='warning'>Please enter your last name.</p>
              <?php endif; ?>
            </label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name.."
            <?php if($missing||$errors){
              echo "value={$lastname}";}?>>

            <label for="email">Email
              <?php if($missing && in_array('email', $missing)):?>
                <p class='warning'>Please enter your email address.</p>
              <?php endif; ?>
              <?php if($errors && in_array('email', $errors)):?>
                <p class='warning'>Please enter a valid email address.</p>
              <?php endif;?>
              
            </label>
            <input type="text" id="email" name="email" placeholder="Your email..."
            <?php if($missing||$errors){
              echo "value={$email}";}?>>




            <label for="company">Company</label>
            <input type="text" id="company" name="company" placeholder="Your company... (optional)"
            <?php if($missing||$errors){
              echo "value={$company}";}?>>

            <label for="category">Category
              <?php if($missing && in_array('category', $missing)):?>
                <p class='warning'>Please select a message category.</p>
              <?php endif; ?>
            </label>
              <select id="mtype" name="category" placeholder='Select from options...'>
                <option value=''>Select from...</option>
                <option value="query">Query</option>
                <option value="comment">Comment</option>
                <option value="request">Request</option>
                <option value="suggestion">Suggestion</option>
                <option value="other">Other</option>
              </select>

            <label for="subject">Message Details
              <?php if($missing && in_array('message', $missing)):?>
                <p class='warning'>Please enter a message.</p>
              <?php endif; ?>
            <label>
            <textarea id="message" name="message" placeholder="Write something.." style="height:200px">
              <?php if($missing||$errors){
                echo "{$message}";}?>
              </textarea>

            <input type="submit" name='send' value="Submit">

          </form>
        </div>
  </section>
</div>
  </body>
</html>
