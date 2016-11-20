<?php namespace GGDX\PhpInsightly\Traits;

trait LeadStatus{

    /**
     * Get all lead Statuses
     *
     * @return object
     */
    public function getLeadStatuses()
    {
        return $this->call('get','LeadStatuses');
    }

    /**
     * Create / Update lead Status
     *
     * @param array $data - See https://api.insight.ly/v2.2/#!/LeadStatuses/AddLeadStatus for fields
     * @return object
     */
    public function saveLeadStatus(array $data = [])
    {
        $data = $this->dataKeysToUpper($data);

        return empty($data['LEAD_STATUS_ID']) ? $this->call('post','LeadStatuses', $data) : $this->call('put','LeadStatuses', $data);
    }


    /**
     * Delete lead Status
     *
     * @param int $id
     * @return void
     */
    public function deleteLeadStatus($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }
        return $this->call('delete','LeadStatuses/'.$id);
    }
}
