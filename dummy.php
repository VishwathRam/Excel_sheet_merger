<?php

$test="2/7/20";
$test=str_replace("/","-",$test);
if($test{1}=='-')
{
	$test="0".$test;
}
if($test{4}=='-')
{
	$test=$test{0}.$test{1}.$test{2}."0".$test{3}.$test{4}.$test{5}.$test{6};
}
echo $test;

?>