<?php namespace GGDX\PhpInsightly\Traits;

trait Currencies{

    /**
     * Get all currencies used by Insightly
     *
     * @return object
     */
    public function getCurrencies()
    {
        return $this->call('get','Currencies');
    }
}
