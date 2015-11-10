<?php

										$servername = "localhost";
                                        $username = "project";
                                        $password = "project";
                                        $dbname = "wp";

                                        $conn = mysqli_connect($servername, $username, $password, $dbname);



if (!$conn) {
                                                die("Connection failed: " . mysqli_connect_error());
                                            }
                                        $sql = "SELECT question
                                        FROM questions
                                        WHERE subject='12CS54' AND co='CO-1' AND lo='LO-1' AND marks='9' AND chapter='1'
                                        ORDER BY RAND() 
                                        LIMIT 1";

                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                //echo "Question " ."$x".": ". $row["question"]. "<br>";
                                                $qd="q_1";
                                                $final_qq = $row["question"];

                                                
                                                echo("<br><br>");
                                            }
                                        }

mysqli_close($conn);
require_once '../PHPWord.php';
echo("HIHI");
echo("<br>");
echo("HIHI");
echo("<br>");
$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template.docx');
$document->setValue($qd, $final_qq);
for($x=1;$x<=10;$x++)
                                      
{
	$rando='12CS54'; 
$valuex="Value";
$document->setValue('subject_code', $rando);
$document->setValue($valuex.$x, "Hi".$x);
/*
$document->setValue('Value2', 'SUP');
$document->setValue('Value3', 'MY NIGGA');
$document->setValue('Value4', 'LOL');
$document->setValue('Value5', 'F');
$document->setValue('Value6', 'Jupiter');
$document->setValue('Value7', 'Saturn');
$document->setValue('Value8', 'Uranus');
$document->setValue('Value9', 'Neptun');
$document->setValue('Value10', 'Pluto');
*/
}
$document->setValue('weekday', date('l'));
$document->setValue('time', date('H:i'));

$document->save('hi/Solarsystemssssss.docx');
?>