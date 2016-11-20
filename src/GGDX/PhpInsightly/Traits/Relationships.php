<?php namespace GGDX\PhpInsightly\Traits;

trait getRelationships{

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
