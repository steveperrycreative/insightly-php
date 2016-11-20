<?php namespace GGDX\PhpInsightly\Traits;

trait Tags{

    /**
     * Get list of relationships
     *
     * @param string $type - Optional, returns tags associated with record type - contacts|leads|opportunities|organisations|projects|emails
     * @return object
     */
    public function getTags($type = false)
    {
        return !$type ? $this->call('get','Tags') : $this->call('get','Tags?record_type='.$type);
    }
}
