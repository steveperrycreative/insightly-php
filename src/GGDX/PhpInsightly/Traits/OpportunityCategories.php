<?php namespace GGDX\PhpInsightly\Traits;

trait OpportunityCategories{

    /**
     * Get opportunity categories (single category if $int)
     *
     * @param int $id Category ID
     * @return object
     */
    public function getOpportunityCategories($id = false)
    {
        return !$id ? $this->call('get','OpportunityCategories') : $this->call('get','OpportunityCategories/'.$id);
    }


    /**
     * Create / Update opportunity category (if $data['CATEGORY_ID'] - update)
     *
     * @param array $data - https://api.insight.ly/v2.2/#!/OpportunityCategories/AddOpportunityCategory
     * @return object
     */
    public function saveOpportunityCategory(array $data = [])
    {
        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return !empty($data['CATEGORY_ID']) ? $this->call('put','OpportunityCategories', $data) : $this->call('post','OpportunityCategories', $data);
    }


    /**
     * Deactivate opportunity category
     *
     * @param int $id Category ID
     * @return void
     */
    public function deleteOpportunityCategory($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','OpportunityCategories/'.$id);
    }
}
