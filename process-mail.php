<?php
/*<?php if(!in_array('email', $missing)&&!preg_match($emailpattern, $email)):?>
  <p class='warning'>Please enter a valid email address.</p>
<?php endif; ?>*/

$mailSent=false;
$suspect= false;
//pearl compatible regular Expression
$pattern = '/Content-type:|Bcc:|Cc:/i'; // 'i' makes it case insensitive

function isSuspect($value, $pattern, &$suspect){
  if(is_array($value)){
    foreach($value as $item){
      isSuspect($item, $pattern, $suspect);
    }
  } else {
      if (preg_match($pattern, $value)){
        $suspect=true;
    }
  }
};

// $isValid=true;
// function isEmail($value, $pattern, &$isValid){
//   if(!preg_match($pattern, $value)){
//     $isValid=false;
//   }
// };




isSuspect($_POST, $pattern, $suspect);

if(!$suspect){
  foreach ($_POST as $key => $value) {
    $value = is_array($value) ? $value : trim($value);   /*check this later, you probs don't need this conditional*/
    if (empty($value)&& in_array($key, $required)){
      $missing[] = $key;
      $$key = '';

    // }elseif($key=='email'){
    //   $$key=$value;
    //   $test=1;
    //   $email_pattern = '^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$^';
    //   isEmail($value, $email_pattern, $isValid);
    //   if (!$isValid){
    //     $errors[]='email';
    //   }


    }elseif(in_array($key, $expected)){//but when will key not be in expected
      $$key=$value;
    };
  };
  //Validate users Email

  if(!empty($email)) :
    $validemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if($validemail){
      $headers[] = "Reply-to: $validemail";
    }else {$errors['email']=true;
    }
  endif;
  //if no erros create headers and message body
  if (!$errors && !$missing) :
      $headers= implode("\r\n", $headers);
      //initialize message
      $message = '';
      foreach($expected as $field):
        if (isset($$field) && !empty($$field)){
          $val = $$field;
        }else{
          $val = 'Not selected';
        };
        // If array, expand to comma separated string
        if (is_array($val)){
          $val = implode(', ', $val);
        }
        //replace underscore in field with spaces
        $field =str_replace('_',' ', $field);
        $message .= ucfirst($field) . ": $val\r\n\r\n";
      endforeach;
      $message = wordwrap($message, 70);
      $mailSent=mail($to, $subject, $message, $headers, $authorized);
      if (!$mailSent){
        $errors['mailfail']=true;
      }
  endif;
};
//if suspect is true, neither missing or errors will have values, script won't run.
?>
