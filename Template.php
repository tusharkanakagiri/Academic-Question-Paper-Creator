<?php
require_once '../PHPWord.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template.docx');

for($x=1;$x<=15;$x++)
               $rando='12CS54';                        
{

$document->setValue('subject_code', $rando);
$document->setValue('Value1', $x);
$document->setValue('Value2', $x);
$document->setValue('Value3', $x);
$document->setValue('Value4', $x+1);
$document->setValue('Value5', $x+1);
$document->setValue('Value6', 'Jupiter');
$document->setValue('Value7', 'Saturn');
$document->setValue('Value8', 'Uranus');
$document->setValue('Value9', 'Neptun');
$document->setValue('Value10', 'Pluto');

}
$document->setValue('weekday', date('l'));
$document->setValue('time', date('H:i'));

$document->save('hi/Solarsystemssssss.docx');
?>