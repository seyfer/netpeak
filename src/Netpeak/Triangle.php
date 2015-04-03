<?php
namespace Kosmoss\Netpeak;

class Triangle
{
    /**
     * @var int
     */
    protected $a = 0;
    /**
     * @var int
     */
    protected $b = 0;
    /**
     * @var int
     */
    protected $c = 0;
    /**
     * @var int
     */
    protected $area = 0;

    public function __construct($a, $b, $c)
    {
        $this->setA($a);
        $this->setB($b);
        $this->setC($c);
    }

    /**
     * @return array
     */
    public function getSidesArray()
    {
        return [
            $this->getA(),
            $this->getB(),
            $this->getC(),
        ];
    }

    /**
     * @return int
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * @param int $a
     * @return $this
     */
    public function setA($a)
    {
        $this->a = $a;

        return $this;
    }

    /**
     * @return int
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * @param int $b
     * @return $this
     */
    public function setB($b)
    {
        $this->b = $b;

        return $this;
    }

    /**
     * @return int
     */
    public function getC()
    {
        return $this->c;
    }

    /**
     * @param int $c
     * @return $this
     */
    public function setC($c)
    {
        $this->c = $c;

        return $this;
    }

    /**
     * @return int
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param int $area
     * @return $this
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }


}