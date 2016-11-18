<?php namespace GGDX\PhpInsightly\Traits;

trait Permissions{

    /**
     * Get user permissions
     *
     * @return object
     */
    public function getPermissions()
    {
        return $this->call('get','Permissions');
    }
}
