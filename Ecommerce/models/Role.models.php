<?php

class Role
{

    private $roleName;
    protected $permissions = [];

    public function __construct($roleName)
    {
        $this->roleName = $roleName;
        $this->assignPermissions();
    }

    public function getRoleName()
    {
        return $this->roleName;
    }

    private function assignPermissions()
    {
        switch ($this->roleName) {
            case "admin":
                $this->permissions = ['create', 'read', 'update', 'delete'];
                break;
            case "user":
                $this->permissions = ['read'];
                break;
            default:
                $this->permissions = ['read'];
                break;
        }
    }

    public function hasPermission($permission)
    {
        return in_array($permission, $this->permissions);
    }
}
