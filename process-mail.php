<?php
foreach ($_POST as $key => $value) {
  /*check this later, you probs don't need this conditional*/
  $value = is_array($value) ? $value : trim($value);
  if (empty($value)&& in_array($key, $required)){
    $missing[] = $key;
    $$key = '';
  }elseif(in_array($key, $expected)){//but when will key not be in expected
    $$key=$value;
  }
};
?>
