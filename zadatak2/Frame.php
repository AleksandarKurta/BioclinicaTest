<?php

class Frame
{

    public function chartValueLine($ge, $sx, $sy, $ex, $ey, $color)
    {
      imageline($ge->getGraphicObject(), 
        $sx, $sy,
        $ex, $ey,
        $color);
    }

    public function xLine($ge, $sx, $sy, $ex, $ey, $color)
    {
        imageline( $ge->getGraphicObject(),
          $sx, $sy,
          $ex, $ey,
          $color);
    }

    public function yLine($ge, $sx, $sy, $ex, $ey, $color)
    {
        imageline( $ge->getGraphicObject(),
          $sx, $sy,
          $ex, $ey,
          $color);
    }

    public function xString($ge, $x, $y, $string, $color)
    {
        imagestring( $ge->getGraphicObject(),
          5, $x, $y, $string,
          $color);
    }

    public function yString($ge, $x, $y, $string, $color)
    {
        imagestring( $ge->getGraphicObject(),
          5, $x, $y, $string,
          $color);
    }
}