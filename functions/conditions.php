<?php

function pageVerification($path)
{
  $url = $_SERVER['REQUEST_URI'];
  $urlWithoutQuery = strtok($url, '?');
  if ($urlWithoutQuery === $path)
    return true;
  return false;
}
;