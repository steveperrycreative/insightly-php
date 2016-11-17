<?php namespace GGDX\PhpInsightly\Traits;

trait Error{

    protected function set_error($data)
    {
        $this->error['errors'][] = $data;
    }
}
