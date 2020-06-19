<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

function dump($data)
{
  echo '<br/><div 
    style="
      display: inline-block;
      padding: 2px 10px;
      border: 1px dashed gray;
      background: lightgray;
      margin:5px;
    "
  >
  <pre>';
  print_r($data);
  echo '</pre>
  </div>
  <br/>';
}
