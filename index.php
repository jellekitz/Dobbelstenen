<html>
    <head>
        <title>dobbelstenen</title>
    </head>
    <body>
    <h1>Dobbel spel nmmr 2</h1>
    <h2>Jelle Kitzen MD1B</h2>
    <style>
    img {
        margin-right: 50px;
        margin-bottom: 50px;
    }
    
    button {
        width: 400px;
        height: 50px;
        background-color: lightgray;
    }
    
    button:hover {
        background-color: dimgray;
    }
</style>

<?php
for ($i=0; $i <= 4 ; $i++) { 
	$dobbel = rand(1, 6);
    create_image($dobbel);
    $aWorp[$i] = $dobbel;
    print "<img src=$dobbel.png?".date("U").">";
}
$aScore = analyse($aWorp);
pokerOrNot($aScore);
       
function  create_image($dobbel){
        $im = @imagecreate(200, 200) or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 10, 60, 10); 
        
        $blue = imagecolorallocate($im, 200, 255, 1);  
    
    if ($dobbel == 1){
        imagefilledellipse($im, 100, 100, 40, 40, $blue); 
    }
    else if ($dobbel == 2){
        imagefilledellipse($im, 40, 40, 40, 40, $blue);
        imagefilledellipse($im, 160, 160, 40, 40, $blue); 
    }
    else if ($dobbel == 3){
        imagefilledellipse($im, 40, 40, 40, 40, $blue); 
        imagefilledellipse($im, 100, 100, 40, 40, $blue); 
        imagefilledellipse($im, 160, 160, 40, 40, $blue); 
    }
    else if ($dobbel == 4){
        imagefilledellipse($im, 40, 40, 40, 40, $blue); 
        imagefilledellipse($im, 160, 40, 40, 40, $blue); 
        imagefilledellipse($im, 40, 160, 40, 40, $blue);
		imagefilledellipse($im, 160, 160, 40, 40, $blue);
    }
    else if ($dobbel == 5){
        imagefilledellipse($im, 40, 40, 40, 40, $blue); 
        imagefilledellipse($im, 160, 40, 40, 40, $blue); 
        imagefilledellipse($im, 100, 100, 40, 40, $blue); 
        imagefilledellipse($im, 40, 160, 40, 40, $blue); 
		imagefilledellipse($im, 160, 160, 40, 40, $blue);
    }
    else if ($dobbel == 6){
        imagefilledellipse($im, 40, 40, 40, 40, $blue); 
		imagefilledellipse($im, 160, 40, 40, 40, $blue); 
		imagefilledellipse($im, 40, 100, 40, 40, $blue); 
        imagefilledellipse($im, 160, 100, 40, 40, $blue); 
		imagefilledellipse($im, 40, 160, 40, 40, $blue); 
		imagefilledellipse($im, 160, 160, 40, 40, $blue); 
    }
        
        imagepng($im, $dobbel . ".png");
        imagedestroy($im);
	
}
        function analyse($aWorp){
    $aScore = array (0,0,0,0,0,0,0);
    for ($i = 1 ; $i <= 6 ; $i++){
		for ($j = 0 ; $j <5 ; $j++){
            if ($aWorp[$j] == $i){
                $aScore[$i]++;
            }}}
    return $aScore;
}
        
function pokerOrNot($aScore){
    echo "<br>analyse van de worp<br>niet gesorteerd";
    print_r($aScore);
    rsort($aScore);
    echo "<br>gesorteerd";
    print_r($aScore);
    echo "<br><br>";
    
    if ($aScore[0] == 5) {echo "Je hebt poker gegooid!";}
    if ($aScore[0] == 4) {echo "Je hebt carre gegooid!";}
    if ($aScore[0] == 3) {
        if ($aScore[1] == 2)echo "Je hebt full house gegooid!";
        else echo "Je hebt een 3 of a kind gegooid!";}
    if ($aScore[0] == 2) {
        if ($aScore[1] == 2)echo "Je hebt 2 paar gegooid!";
        else echo "Je hebt 1 paar gegooid!";}
    }
?>



<form>
<button onclick="myFunction()">Reload</button>
</form>

    </body>
    
    <script>
        function myFunction() {
            location.reload();
        }
    </script>

</html>