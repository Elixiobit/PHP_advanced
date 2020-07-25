<?php
class Rectangle {
    protected $height;
    protected $width;

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }
}


class Square extends Rectangle{
    public function setHeight($height)
    {
        $this->height = $height;
        $this->width = $height;
    }

    public function setWidth($width)
    {
        $this->height = $width;
        $this->width = $width;
    }
}


$figure = new Square();

$figure->setHeight(4);
var_dump($figure);
$figure->setWidth(5);
calculateArea($figure);
function calculateArea(Rectangle $figure) {
    echo $area = $figure->getHeight() * $figure->getWidth();
}
