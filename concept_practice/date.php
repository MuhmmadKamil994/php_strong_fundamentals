<?php
$currenttime=time();
echo $currenttime.'<br>';
echo ($currenttime-5*24*60*60)."<br>";
echo ($currenttime-24*60*60).'<br>';
echo date_default_timezone_get();
date_default_timezone_set('UTC');
echo date('y/m/d g:ia',$currenttime).'<br>';
echo date('y/m/d g:ia',($currenttime-5*24*60*60)).'<br>';
echo date('y/m/d g:ia',($currenttime-24*60*60)).'<br>';
echo date_default_timezone_get();