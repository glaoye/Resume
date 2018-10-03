<!--************************** PHP: set arrays **********************************-->

<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])){
  $expected = ['firstname','lastname','email','company','category','message_details'];
  $required = ['firstname','lastname','email','category','message_details'];
  $to = 'Gloria Laoye <gloria.laoye@durham.ac.uk';
  $subject = 'Feedback from my website';
  $headers = [];
  $headers[] = 'From: webmaster@example.com';
  $headers[] = 'Content-type: text/plain;charset=utf-8';
  $authorized = null;
  require 'process-mail.php';
  if ($mailSent){
    header('Location: thanks.php');
    exit;
  }
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
    <!--************************** banner **********************************-->
    <section class = 'banner'>
      <div class='content'>
        <a href="index.html"><button>Resume</button></a>
        <a href="values.html"><button>My Values</button></a>
        <a href="bestwork.html"><button>Best Work</button></a>
        <a href="contact.php"><button>Contact</button></a>
      </div>
    </section>
    <div class='content'>

      <!--************************** header **********************************-->
    <header>

          <h1>Contact Me!</h1>

    </header>

<!--************************** form **********************************-->
    <section class='contactform'>

        <div class="container">

          <form method='post' action="<?= $_SERVER['PHP_SELF'];?>">
    <!--remember: action is not executed here, but in the conditional statement on top of html.
    This current action sends page to itself-->
              <?php if($missing):?>
                <p class='warningheading'>Please fill in the required field(s).</p>
              <?php endif; ?>
              <?php if($errors):?>
                <p class='warningheading'>Please fix the following error(s)</p>
              <?php endif; ?>
              <?php if($_POST && ($suspect||isset($errors['mailfail']))):?>
                <p class='warningheading'>Sorry, your message was unable to be sent.</p>
              <?php endif; ?>

              <!--**firstname**-->
            <label for="fname">First Name
              <?php if($missing && in_array('firstname', $missing)):?>
                <p class='warning'>Please enter your first name.</p>
              <?php endif; ?>
            </label>
            <input type="text" id="fname" name="firstname" placeholder="Your first name.."
            <?php if($missing||$errors){
              echo "value={$firstname}";}?>>


              <!--**lastname**-->

            <label for="lname">Last Name
              <?php if($missing && in_array('lastname', $missing)):?>
                <p class='warning'>Please enter your last name.</p>
              <?php endif; ?>
            </label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name.."
            <?php if($missing||$errors){
              echo "value={$lastname}";}?>>


              <!--**email**-->


            <label for="email">Email
              <?php if($missing && in_array('email', $missing)):?>
                <p class='warning'>Please enter your email address.</p>
              <?php elseif (isset($errors['email'])):?>
                <p class='warning'>Invalid email address</p>
              <?php endif; ?>
            </label>
            <input type="text" id="email" name="email" placeholder="Your email..."
            <?php if($missing||$errors){
              echo "value={$email}";}?>>


              <!--**company**-->

            <label for="company">Company</label>
            <input type="text" id="company" name="company" placeholder="Your company... (optional)"
            <?php if($missing||$errors){
              echo "value={$company}";}?>>


              <!--**category**-->


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

              <!--**messagedetails**-->


            <label for="subject">Message Details
              <?php if($missing && in_array('message_details', $missing)):?>
                <p class='warning'>Please enter a message.</p>
              <?php endif; ?>
            <label>
            <textarea id="message_details" name="message_details" placeholder="Write something.." style="height:200px"><?php
            if($missing||$errors){
                echo "{$message_details}";}?></textarea>

            <input type="submit" name='send' value="Submit">

          </form>
        </div>
  </section>
</div>
<pre>

                <!--*************MailSent testing*************-->
<?php
if ($_POST && $mailSent){
  echo "Message: \n\n";
  echo htmlentities($message);
  echo "Headers \n\n";
  echo htmlentities($headers);
}?>
</pre>
  </body>
</html>
