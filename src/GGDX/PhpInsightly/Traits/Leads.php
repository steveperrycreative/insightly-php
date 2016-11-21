<?php namespace GGDX\PhpInsightly\Traits;

trait Leads{

    /**
     * Get all leads (if $id - get single lead)
     *
     * @param int $id Lead ID
     * @return object
     */
    public function getLeads($id = false)
    {
        return !$id ? $this->call('get','Leads') : $this->call('get','Leads/'.$id);
    }


    /**
     * Create / Update lead
     *
     * @param array $data - extensive field set. See https://api.insight.ly/v2.2/#!/Leads/AddLead for full list of fields.
     * @return object
     */
    public function saveLead(array $data = [])
    {
        $data = $this->dataKeysToUpper($data);

        return empty($data['LEAD_ID']) ? $this->call('post','Leads', $data) : $this->call('put','Leads', $data);
    }


    /**
     * Delete lead
     *
     * @param int $id Lead ID
     */
    public function deleteLead($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Leads/'.$id);
    }


    /**
     * Delete lead Image
     *
     * @param int $id Lead ID
     */
    public function deleteLeadImage($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Leads/'.$id.'/Image');
    }


    /**
     * Get lead Image
     *
     * @param int $id Lead ID
     * @return object
     */
    public function getLeadImage($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Leads/'.$id.'/Image');
    }


    /**
     * Update lead Custom Field
     *
     * @param int $id Lead ID
     * @param array $data - See https://api.insight.ly/v2.2/#!/Leads/UpdateCustomField for fields
     * @return object
     */
    public function updateLeadCustomField($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        }

        $data = $this->dataKeysToUpper($data);

        return $this->call('put','Leads/'.$id.'/CustomFields');
    }


    /**
     * Delete lead Custom Field
     *
     * @param int $id Lead ID
     * @param int $cf_id Custom Field ID
     * @return void
     */
    public function deleteLeadCustomField($id = false, $cf_id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!$cf_id){
            $this->set_error(__FUNCTION__.' -> $cf_id must be provided.');
        }

        return $this->call('delete','Leads/'.$id.'/CustomFields/'.$cf_id);
    }


    /**
     * Add lead tag
     *
     * @param int $id Lead ID
     * @param string $tag
     * @return object
     */
    public function addLeadTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!$tag){
            $this->set_error(__FUNCTION__.' -> $tag must be provided.');
        }

        return $this->call('post','Leads/'.$id.'/Tags',['TAG_NAME' => $tag]);
    }


    /**
     * Delete lead Tag
     *
     * @param int $id Lead ID
     * @param string $tag Tag name
     * @return void
     */
    public function deleteLeadTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!$tag){
            $this->set_error(__FUNCTION__.' -> $tag must be provided.');
        }

        return $this->call('delete','Leads/'.$id.'/Tags/'.$tag);
    }


    /**
     * Get lead Events
     *
     * @param int $id Lead ID
     * @return object
     */
    public function getLeadEvents($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Leads/'.$id.'/Events');
    }


    /**
     * Get lead Notes
     *
     * @param int $id Lead ID
     * @return object
     */
    public function getLeadNotes($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Leads/'.$id.'/Notes');
    }


    /**
     * Create Lead note
     *
     * @param int $id Lead ID
     * @param array $data - See https://api.insight.ly/v2.2/#!/Leads/AddNote for fields
     * @return object
     */
    public function createLeadNote($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be set.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('post','Leads/'.$id.'/Notes', $data);
    }


    /**
     * Get lead Follow Status
     *
     * @param int $id Lead ID
     * @return object
     */
    public function isFollowLead($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Leads/'.$id.'/Follow');
    }


    /**
     * Follow lead
     *
     * @param int $id Lead ID
     * @return object
     */
    public function followLead($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('post','Leads/'.$id.'/Follow');
    }


    /**
     * Unfollow lead
     *
     * @param int $id Lead ID
     * @return void
     */
    public function unfollowLead($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Leads/'.$id.'/Follow');
    }


    /**
     * Get lead Attachments
     *
     * @param int $id Lead ID
     * @return object
     */
    public function getLeadAttachments($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Leads/'.$id.'/FileAttachments');
    }


    /**
     * Get lead Emails
     *
     * @param int $id Lead ID
     * @return object
     */
    public function getLeadEmails($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Leads/'.$id.'/Emails');
    }


    /**
     * Get lead Tasks
     *
     * @param int $id Lead ID
     * @return object
     */
    public function getLeadTasks($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Leads/'.$id.'/Tasks');
    }
}
