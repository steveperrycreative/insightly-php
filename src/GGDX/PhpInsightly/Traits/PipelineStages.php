<?php namespace GGDX\PhpInsightly\Traits;

trait PipelineStages{

    /**
     * Get pipeline stages (if $id - single stage)
     *
     * @return object
     */
    public function getPipelineStages($id = false)
    {
        return !$id ? $this->call('get','PipelineStages') : $this->call('get','PipelineStages/'.$id);
    }
}
