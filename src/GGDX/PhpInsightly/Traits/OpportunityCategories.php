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
            $this->set_error('saveOpportunityCategory() -> $data must be provided.');
        }

        $data = $this->dataKeysToUpper($data);

        return !count($data['CATEGORY_ID']) ? $this->call('post','OpportunityCategories', $data) : $this->call('put','OpportunityCategories', $data);
    }


    /**
     * Deactivate opportunity category
     *
     * @param int $id Category ID
     * @return object
     */
    public function deleteOpportunityCategory($id = false)
    {
        if(!$id){
            $this->set_error('deleteOpportunityCategory() -> $id must be provided.');
        }

        return !$id ? $this->call('delete','OpportunityCategories/'.$id);
    }
}
