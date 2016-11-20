<?php namespace GGDX\PhpInsightly\Traits;

trait Relationships{

    /**
     * Get list of relationships
     *
     * @return object
     */
    public function getRelationships()
    {
        return $this->call('get','Relationships');
    }
}
