<?php

function showError($errors, $name){
  return ' <p style="color:red">'.$errors->first($name).'</p>';
}