<?php namespace GGDX\PhpInsightly\Traits;

trait Opportunities{

    /**
     * Get all opportunities (if $id - single opportunity record)
     *
     * @param int $id Opportunity ID
     * @return object
     */
    public function getOpportunities($id = false)
    {
        return !$id ? $this->call('get','Opportunities') : $this->call('get','Opportunities/'.$id);
    }


    /**
     * Create / Update opportunity
     *
     * @param array $data - See https://api.insight.ly/v2.2/#!/Opportunities/AddOpportunity for fields
     * @return object
     */
    public function saveOpportinity(array $data = [])
    {
        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        }

        $data = $this->dataKeysToUpper($data);

        return empty($data['OPPORTUNITY_ID']) ? $this->call('post','Opportunities', $data) : $this->call('put','Opportunities', $data);
    }


    /**
     * Delete opportunity
     *
     * @param int $id Opportunity ID
     * @return void
     */
    public function deleteOpportinity($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Opportunities/'.$id);
    }


    /**
     * Get opportunity image
     *
     * @param int $id Opportunity ID
     * @return object
     */
    public function getOpportinityImage($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Opportunities/'.$id.'/Image');
    }


    /**
     * Delete opportunity image
     *
     * @param int $id Opportunity ID
     * @return void
     */
    public function deleteOpportinityImage($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Opportunities/'.$id.'/Image');
    }


    /**
     * Update opportunity custom field
     *
     * @param int $id Opportunity ID
     * @return object
     */
    public function updateOpportinityCustomFields($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        $data = $this->dataKeysToUpper($data);

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        }

        return $this->call('delete','Opportunities/'.$id.'/CustomFields');
    }


    /**
     * Add opportunity tag
     *
     * @param int $id Opportunity ID
     * @param string $tag
     * @return object
     */
    public function addOpportinityTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!$tag){
            $this->set_error(__FUNCTION__.' -> $tag must be provided.');
        }

        return $this->call('post','Opportunities/'.$id.'/Events', ['TAG_NAME' => $tag]);
    }


    /**
     * Delete opportunity tag
     *
     * @param int $id Opportunity ID
     * @param string $tag
     * @return void
     */
    public function deleteOpportinityTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!$tag){
            $this->set_error(__FUNCTION__.' -> $tag must be provided.');
        }

        return $this->call('delete','Opportunities/'.$id.'/Events/'.$tag);
    }


    /**
     * Get opportunity events
     *
     * @param int $id Opportunity ID
     * @return object
     */
    public function getOpportinityEvents($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Opportunities/'.$id.'/Events');
    }


    /**
     * Get opportunity notes
     *
     * @param int $id Opportunity ID
     * @return object
     */
    public function getOpportinityNotes($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Opportunities/'.$id.'/Notes');
    }


    /**
     * Get opportunity emails
     *
     * @param int $id Opportunity ID
     * @return object
     */
    public function getOpportinityEmails($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Opportunities/'.$id.'/Emails');
    }


    /**
     * Get opportunity tasks
     *
     * @param int $id Opportunity ID
     * @return object
     */
    public function getOpportinityStateHistory($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Opportunities/'.$id.'/StateHistory');
    }


    /**
     * Get opportunity tasks
     *
     * @param int $id Opportunity ID
     * @return object
     */
    public function getOpportinityTasks($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Opportunities/'.$id.'/Tasks');
    }


    /**
     * Get opportunity attachments
     *
     * @param int $id Opportunity ID
     * @return object
     */
    public function getOpportinityAttachments($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Opportunities/'.$id.'/Attachments');
    }


    /**
     * Add opportunity note
     *
     * @param int $id Opportunity ID
     * @param array $data - full field list at https://api.insight.ly/v2.2/#!/Opportunities/AddNote
     * @return object
     */
    public function addOpportinityNote($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('post','Opportunities/'.$id.'/Notes', $data);
    }


    /**
     * Follow opportunities
     *
     * @param int $id Opportunity ID
     * @return object
     */
    public function followOpportunity($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('post','Opportunities/'.$id.'/Follow');
    }


    /**
     * Unfollow opportunities
     *
     * @param int $id Opportunity ID
     * @return void
     */
    public function unfollowOpportunity($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Opportunities/'.$id.'/Follow');
    }


    /**
     * Retrieve opportunity follow status
     *
     * @param int $id Opportunity ID
     * @return object
     */
    public function isFollowOpportunity($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Opportunities/'.$id.'/Follow');
    }


    /**
     * Clear opportunity pipeline
     *
     * @param int $id Opportunity ID
     * @return void
     */
    public function clearOpportinityPipeline($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Opportunities/'.$id.'/Pipeline');
    }


    /**
     * Change opportunity pipeline
     *
     * @param int $id Opportunity ID
     * @param array $data Opportunity ID - https://api.insight.ly/v2.2/#!/Opportunities/UpdatePipeline
     * @return object
     */
    public function changeOpportinityPipeline($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('put','Opportunities/'.$id.'/Pipeline');
    }


    /**
     * Change opportunity pipeline stage
     *
     * @param int $id Opportunity ID
     * @param array $data Opportunity ID - https://api.insight.ly/v2.2/#!/Opportunities/UpdatePipelineStage
     * @return object
     */
    public function changeOpportinityPipelineStage($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('put','Opportunities/'.$id.'/PipelineStage');
    }
}
