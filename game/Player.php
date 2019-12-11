<?php

class Player
{
    private $y = 5;
    private $x = 5;

    public function __construct($x, $y)
    {
        $this->setX($x);
        $this->setY($y);
    }

    public function isOnField($u, $i)
    {
        if ($u == $this->getX() && $i == $this->getY()) {
            return true;
        }
        return false;
    }

    public function vision($u, $i)
    {
        $x = $this->getX();
        $y = $this->getY();

        $range = 1;
        if ($u == $x + $range && $i == $y + $range) {
            return 'green';
        }
        if ($u == $x - $range && $i == $y + $range) {
            return 'green';
        }
        if ($u == $x - $range && $i == $y - $range) {
            return 'green';
        }
        if ($u == $x + $range && $i == $y - $range) {
            return 'green';
        }
        if ($u == $x - $range && $i == $y) {
            return 'green';
        }
        if ($u == $x + $range && $i == $y) {
            return 'green';
        }
        if ($u == $x && $i == $y - $range) {
            return 'green';
        }
        if ($u == $x && $i == $y + $range) {
            return 'green';
        }
        return 'gray';
    }


    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param int $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param int $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }
}