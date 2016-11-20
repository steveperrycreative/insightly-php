<?php namespace GGDX\PhpInsightly\Traits;

trait Users{

    /**
     * Get all users (single record if $id)
     *
     * @param int $id - User ID
     * @return object
     */
    public function getUsers($id = false)
    {
        return !$id ? $this->call('get','Users') : $this->call('get','Users/'.$id);
    }


    /**
     * Get your own record
     *
     * @return object
     */
    public function me()
    {
        return $this->call('get','Users/Me');
    }


}
