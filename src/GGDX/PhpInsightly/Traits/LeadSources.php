<?php namespace GGDX\PhpInsightly\Traits;

trait LeadSources{

    /**
     * Get all lead sources
     *
     * @return object
     */
    public function getLeadSources()
    {
        return $this->call('get','LeadSources');
    }

    /**
     * Create / Update lead source
     *
     * @param array $data - See https://api.insight.ly/v2.2/#!/LeadSources/AddLeadSource for field
     * @return object
     */
    public function saveLeadSource(array $data = [])
    {
        $data = $this->dataKeysToUpper($data);

        return empty($data['LEAD_SOURCE_ID']) ? $this->call('post','LeadSources', $data) : $this->call('put','LeadSources', $data);
    }


    /**
     * Delete lead source
     *
     * @param int $id
     * @return void
     */
    public function deleteLeadSource($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }
        return $this->call('delete','LeadSources/'.$id);
    }
}
