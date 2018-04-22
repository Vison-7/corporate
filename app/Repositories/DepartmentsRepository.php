<?php
namespace Corp\Repositories;

use Corp\Menu;
use Corp\Department;

class DepartmentsRepository extends Repository{
    public function __construct(Department $dep){
        $this->model = $dep;
    }
}
?>