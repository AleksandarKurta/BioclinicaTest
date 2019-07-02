<?php
require_once( "lib.php" );
 
$ge = new GraphicsEnvironment( 800, 800 );
 
$ge->addColor( "black", 0, 0, 0 );
$ge->addColor( "red", 255, 0, 0 );
$ge->addColor( "green", 0, 255, 0 );
$ge->addColor( "blue", 0, 0, 255 );

$color = imagecolorallocate($ge->getGraphicObject(), 0, 0, 255 );

$frame = new Frame();

// Values for X, Y axes
$arrY = [500,400,128,1000, 150, 627, 880, 1300, -25];
$arrX = [7, 14, 21, 28, 35, 42, 49, 56, 63];

$max = max($arrY);

$gobjs = [];

// Chart 1 functionality
$chart1TotalHeight = 275;
$chart1EightyPercentHeight = 250 * 80 / 100;
$chart1EightyPercent = $chart1TotalHeight - $chart1EightyPercentHeight;

$fl = 25;
$ft = 275;
$sl = 75;
$counter = 0;
foreach($arrY as $b){
    $percent = $chart1EightyPercentHeight * (100 * $b / $max) / 100;
    $st = $chart1TotalHeight - $percent;
    $value = $frame->xString($ge, $sl, $st - 20, "$b", $color);
    if($counter == 0){
        $frame->chartValueLine($ge, $fl, $ft, $sl, $st, $color);
        $value;
        $frame->xString($ge, $sl , 280, "$arrX[$counter]", $color);
        $fl = $sl;
        $ft = $st;
    }elseif($b == $max){
        $frame->chartValueLine($ge, $fl, $ft, $sl, $chart1EightyPercent, $color);
        $value;
        $frame->xString($ge, $sl , 280, "$arrX[$counter]", $color);
        $fl = $sl;
        $ft = $st;
    }else{
        $frame->chartValueLine($ge, $fl, $ft, $sl, $st, $color);
        $value;
        $frame->xString($ge, $sl , 280, "$arrX[$counter]", $color);
        $fl = $sl;
        $ft = $st;
    }
    $counter++;
    $sl += 75;
}

// Chart 2 functionality
$chart2TotalHeight = 650;
$chart2EightyPercentHeight = 300 * 80 / 100;
$chart2EightyPercent = $chart2TotalHeight - $chart2EightyPercentHeight;

$one = 50;
$two = 100;
$xNumbers = 0;
$counter = 0;
foreach($arrY as $a){
    $xNumbers++;
    if($a == $max){
        $gobjs[] = new Bar("black", $one, $chart2EightyPercent, $two, 650 );
        $frame->xString($ge, $one + 20, $chart2TotalHeight - $chart2EightyPercentHeight - 20, "$a", $color);
        $frame->xString($ge, $two - 25 , 655, "$arrX[$counter]", $color);
    }else{
        $percent = $chart2EightyPercentHeight  * (100 * $a / $max) / 100;
        $chart2BarHeight = $chart2TotalHeight - $percent;
        $gobjs[] = new Bar("black", $one, $chart2BarHeight, $two, 650 );
        if($a > 0){
            $valueShow =  $chart2TotalHeight - $percent - 20;
        }else{
            $valueShow =  $chart2TotalHeight - $percent + 20;
        }
        $frame->xString($ge, $one + 20, $valueShow, "$a", $color);
        $frame->xString($ge, $two - 25 , 655, "$arrX[$counter]", $color);
    }
    $one += 75;
    $two += 75;
    $counter++;
}

// Frame Chart 1
$frame->yLine($ge, 25, 25, 25, 275, $color);
$frame->xLine($ge, 25, 275, $two, 275, $color);

// Show X, Y Chart 1
$frame->xString($ge, $two , 280, "X", $color);
$frame->yString($ge, 10 , 30, "Y", $color);


// Frame Chart2 
$frame->yLine($ge, 25, 350, 25, 650, $color);
$frame->xLine($ge, 25, 650, $two, 650, $color);

// Show X, Y Chart 2
$frame->xString($ge, $two , 655, "X", $color);
$frame->yString($ge, 10 , 350, "Y", $color);

 
foreach( $gobjs as $gobj ){ 
    $gobj->render( $ge ); 
}
 
$ge->saveAsPng( "test.png" );
?>