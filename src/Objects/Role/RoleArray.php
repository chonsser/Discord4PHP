<?php
namespace Discord\Objects\Role;

use \Discord\Objects\Role\Role;

class RoleArray {

    public $allroles;

    public function __construct($data) {
        $this->allroles = array();
        foreach ($data as $role) {
            $this->allroles[$role['name']] = new Role($role);
        }
    }
    public function getRoleByName($name) {
        return $this->allroles[$name];
    }
    public function getAllRoles() {
        return $this->allroles;
    }
}
