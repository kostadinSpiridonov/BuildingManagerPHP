<?php
class Building
{
    public $id;
    public $name;
    public $location;
    public $description;
    public $images;

    public function __construct(int $iden, string $n, string $l, string $d, array $i)
    {
        $this->id = $iden;
        $this->name = $n;
        $this->location = $l;
        $this->description = $d;
        $this->images = $i;
    }
}
?>