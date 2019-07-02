<?php

abstract class BoxObject extends GraphicsObject
{
  protected $color;
  protected $sx;
  protected $sy;
  protected $ex;
  protected $ey;
 
  public function __construct( $color, $sx, $sy, $ex, $ey )
  {
    $this->color = $color;
    $this->sx = $sx;
    $this->sy = $sy;
    $this->ex = $ex;
    $this->ey = $ey;
  }

}