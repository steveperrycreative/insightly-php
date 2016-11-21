<?php namespace GGDX\PhpInsightly\Traits;

trait CustomFields{

    /**
     * Get all custom fields
     *
     * @return object
     */
    public function getCustomFields()
    {
        return $this->call('get','CustomFields');
    }
}
