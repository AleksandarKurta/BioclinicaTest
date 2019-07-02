<?php

class Bar extends BoxObject
{
  public function render( $ge )
  {
    imagerectangle( $ge->getGraphicObject(),
      $this->sx, $this->sy,
      $this->ex, $this->ey,
      $ge->getColor( $this->color ) );
  }
}