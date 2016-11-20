<?php namespace GGDX\PhpInsightly\Traits;

trait Projects{

    /**
     * Get all projects (if $id, retrieve single project)
     *
     * @param int $id Project ID
     * @return object
     */
    public function getProjects($id = false)
    {
        return !$id ? $this->call('get','Projects') ? $this->call('get','Projects/'.$id);
    }

    /**
     * Create / Update project
     *
     * @param array $data - See https://api.insight.ly/v2.2/#!/Projects/AddProject for field
     * @return object
     */
    public function saveProject(array $data = [])
    {
        $data = $this->dataKeysToUpper($data);

        return empty($data['PROJECT_ID']) ? $this->call('post','Projects', $data) : $this->call('put','Projects', $data);
    }


    /**
     * Delete Project
     *
     * @param int $id Project ID
     * @return void
     */
    public function deleteProject($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }
        return $this->call('delete','Projects/'.$id);
    }


    /**
     * Get project image
     *
     * @param int $id Project ID
     * @return object
     */
    public function getProjectImage($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Projects/'.$id.'/Image');
    }


    /**
     * Delete project image
     *
     * @param int $id Project ID
     * @return void
     */
    public function deleteProjectImage($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Projects/'.$id.'/Image');
    }


    /**
     * Update project custom field
     *
     * @param int $id Project ID
     * @param array $data - See https://api.insight.ly/v2.2/#!/Projects/UpdateCustomField for fields
     * @return object
     */
    public function updateProjectCustomField($id = false, array $data= [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('put','Projects/'.$id.'/Image');
    }


    /**
     * Delete project custom field
     *
     * @param int $id Project ID
     * @param string $cf_id Custom Field ID
     * @return void
     */
    public function deleteProjectCustomField($id = false, $cf_id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!$cf_id){
            $this->set_error(__FUNCTION__.' -> $cf_id must be provided.');
        }

        return $this->call('delete','Projects/'.$id.'/CustomFields/'.$cf_id);
    }


    /**
     * Add project tag
     *
     * @param int $id Project ID
     * @param array $data - See https://api.insight.ly/v2.2/#!/Projects/UpdateCustomField for fields
     * @return object
     */
    public function createProjectTag($id = false, array $data= [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('post','Projects/'.$id.'/Tags', $data);
    }


    /**
     * Delete project tag
     *
     * @param int $id Project ID
     * @param string $tag Tag name
     * @return void
     */
    public function deleteProjectTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!$tag){
            $this->set_error(__FUNCTION__.' -> $tag must be provided.');
        }

        return $this->call('delete','Projects/'.$id.'/Tags/'.$tag);
    }


    /**
     * Get project events
     *
     * @param int $id Project ID
     * @return object
     */
    public function getProjectEvents($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Projects/'.$id.'/Events');
    }


    /**
     * Get project notes
     *
     * @param int $id Project ID
     * @return object
     */
    public function getProjectNotes($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Projects/'.$id.'/Notes');
    }


    /**
     * Add project note
     *
     * @param int $id Project ID
     * @param array $data - See https://api.insight.ly/v2.2/#!/Projects/AddNote for fields
     * @return object
     */
    public function createProjectNote($id = false, array $data= [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('post','Projects/'.$id.'/Notes', $data);
    }


    /**
     * Follow project
     *
     * @param int $id Project ID
     * @return object
     */
    public function followProject($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('post','Projects/'.$id.'/Follow');
    }


    /**
     * Unfollow project
     *
     * @param int $id Project ID
     * @return void
     */
    public function unfollowProject($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Projects/'.$id.'/Follow');
    }


    /**
     * Check project follow status
     *
     * @param int $id Project ID
     * @return object
     */
    public function isFollowProject($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Projects/'.$id.'/Follow');
    }


    /**
     * Add project activity
     *
     * @param int $id Project ID
     * @param array $data - See https://api.insight.ly/v2.2/#!/Projects/AddActivitySetAssignment for fields
     * @return object
     */
    public function createProjectActivity($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('post','Projects/'.$id.'/ActivitySetAssignment', $data);
    }


    /**
     * Clear project pipeline
     *
     * @param int $id Project ID
     * @return void
     */
    public function clearProjectPipeline($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Projects/'.$id.'/Pipeline');
    }


    /**
     * Change project pipeline
     *
     * @param int $id Project ID
     * @param array $data Project ID - https://api.insight.ly/v2.2/#!/Projects/UpdatePipeline
     * @return object
     */
    public function changeProjectPipeline($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('put','Projects/'.$id.'/Pipeline');
    }


    /**
     * Change project pipeline stage
     *
     * @param int $id Project ID
     * @param array $data Project ID - https://api.insight.ly/v2.2/#!/Projects/UpdatePipelineStage
     * @return object
     */
    public function changeProjectPipelineStage($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('put','Projects/'.$id.'/PipelineStage');
    }


    /**
     * Get project milestones
     *
     * @param int $id Project ID
     * @return object
     */
    public function getProjectMilestones($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Projects/'.$id.'/Milestones');
    }


    /**
     * Create / Update project milestone
     *
     * @param int $id Project ID
     * @param array $data - See https://api.insight.ly/v2.2/#!/Projects/AddMilestone for fields
     * @return object
     */
    public function saveProjectMilestone($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return empty($data['MILESTONE_ID']) ? $this->call('post','Projects/'.$id.'/Milestones', $data) : $this->call('put','Projects/'.$id.'/Milestones', $data);
    }


    /**
     * Delete project milestone
     *
     * @param int $id Project ID
     * @param int $m_id Milestone ID
     * @return void
     */
    public function deleteProjectMilestones($id = false, $m_id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!$m_id){
            $this->set_error(__FUNCTION__.' -> $m_id must be provided.');
        }

        return $this->call('delete','Projects/'.$id.'/Milestones/'.$m_id);
    }


    /**
     * Get project emails
     *
     * @param int $id Project ID
     * @return object
     */
    public function getProjectEmails()
    {
        return $this->call('get','Projects/'.$id.'/Emails');
    }


    /**
     * Get project attachments
     *
     * @param int $id Project ID
     * @return object
     */
    public function getProjectAttachments()
    {
        return $this->call('get','Projects/'.$id.'/FileAttachments');
    }


    /**
     * Get project tasks
     *
     * @param int $id Project ID
     * @return object
     */
    public function getProjectTasks()
    {
        return $this->call('get','Projects/'.$id.'/Tasks');
    }
}
