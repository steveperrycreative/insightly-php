<?php namespace GGDX\PhpInsightly\Traits;

trait Pipelines{

    /**
     * Get pipelines (if $id - single pipeline)
     *
     * @return object
     */
    public function getPipelines($id = false)
    {
        return !$id ? $this->call('get','Pipelines') : $this->call('get','Pipelines/'.$id);
    }
}
