<?php namespace GGDX\PhpInsightly\Traits;

trait CustomFieldGroups{

    /**
     * Get all custom field groups
     *
     * @return object
     */
    public function getCustomFieldGroups()
    {
        return $this->call('get','CustomFieldGroups');
    }
}
