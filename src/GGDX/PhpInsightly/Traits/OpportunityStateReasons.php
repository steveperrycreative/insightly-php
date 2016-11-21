<?php namespace GGDX\PhpInsightly\Traits;

trait OpportunityStateReasons{

    /**
     * Get all Opportunity State Reasons
     *
     * @return object
     */
    public function getOpportunityStateReasons()
    {
        return $this->call('get','OpportunityStateReasons');
    }
}
