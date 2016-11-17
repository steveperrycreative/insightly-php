<?php namespace GGDX\PhpInsightly\Traits;

trait CustomFields{

    /**
     * Get all custom fields
     *
     * @return object
     */
    public function getCustomField()
    {
        return $this->call('get','CustomFields');
    }
}
