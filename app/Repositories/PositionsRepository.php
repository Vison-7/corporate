<?php
namespace Corp\Repositories;

use Corp\Menu;
use Corp\Position;

class PositionsRepository extends Repository{
    public function __construct(Position $position){
        $this->model = $position;
    }
}
?>