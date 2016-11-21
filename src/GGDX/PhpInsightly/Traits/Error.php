<?php namespace GGDX\PhpInsightly\Traits;

trait Error{

    /**
     * Add message to error array
     *
     *
     * @param string $data Error message content
     */

    protected function set_error($data)
    {
        $this->error['errors'][] = $data;
    }
}
