<?php namespace GGDX\PhpInsightly\Traits;

trait Organisations{

    /**
     * Get list of Organisations
     *
     * @param int $id - Organisation ID
     * @return object
     */
    public function getOrganisations($id = false)
    {
        return !$type ? $this->call('get','Organisations') : $this->call('get','Organisations/'.$id);
    }
    public function getOrganizations($id = false)
    {
       return $this->getOrganisations($id);
    }



    /**
     * Create/Update organisation
     *
     * @param array $data - for fields, see https://api.insight.ly/v2.2/#!/Organisations/AddOrganisation
     * @return object
     */
    public function saveOrganisation(array $data = [])
    {
        if(!count($data)){
            $this->set_error(__FUNCTION__.'() -> Organisation $data must be provided.');
        }

        $data = $this->dataKeysToUpper($data);

        return empty($data['ORGANISATION_ID']) ? $this->call('post', 'Organisations', $data) :  $this->call('put', 'Organisations', $data);
    }
    public function saveOrganization(array $data = [])
    {
       return $this->saveOrganisation($data);
    }



    /**
     * Delete Organisation
     *
     * @param int $id - Organisation ID
     * @return void
     */
    public function deleteOrganisation($id = false)
    {
        if(!count($id)){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }

        return $this->call('delete','Organisations/'.$id);
    }
    public function deleteOrganization($id = false)
    {
       return $this->deleteOrganisation($id);
    }



    /**
     * Get Organisation Image
     *
     * @param int $id - Organisation ID
     * @return object
     */
    public function getOrganisationImage($id = false)
    {
        if(!count($id)){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }

        return $this->call('get','Organisations/'.$id.'/Image');
    }
    public function getOrganizationImage($id = false)
    {
       return $this->getOrganisationImage($id);
    }



    /**
     * Delete Organisation Image
     *
     * @param int $id - Organisation ID
     * @return void
     */
    public function deleteOrganisationImage($id = false)
    {
        if(!count($id)){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }

        return $this->call('delete','Organisations/'.$id.'/Image');
    }
    public function deleteOrganizationImage($id = false)
    {
       return $this->deleteOrganisationImage($id);
    }



    /**
     * Create/Update organisation address
     *
     * @param int $id Organisation ID
     * @param array $data - for fields, see https://api.insight.ly/v2.2/#!/Organisations/AddAddress
     * @return object
     */
    public function saveOrganisationAddress($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.'() -> $data must be provided.');
        }

        $data = $this->dataKeysToUpper($data);

        return empty($data['ADDRESS_ID']) ? $this->call('post', 'Organisations/'.$id.'/Addresses', $data) :  $this->call('put', 'Organisations/'.$id.'/Addresses', $data);
    }
    public function saveOrganizationAddress($id = false, array $data = [])
    {
       return $this->saveOrganisationAddress($id, $data);
    }



    /**
     * Delete an organisation address
     *
     * @param int $id Organisation ID
     * @param int $id Address ID
     * @return void
     */
    public function deleteOrganisationAddress($id = false, $a_id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }
        if(!$a_id){
            $this->set_error(__FUNCTION__.'() -> Address $a_id must be provided.');
        }

        return $this->call('delete', 'Organisations/'.$id.'/Addresses/'.$a_id);
    }
    public function deleteOrganizationAddress($id = false, $a_id = false)
    {
       return $this->deleteOrganisationAddress($id, $a_id);
    }



    /**
     * Add / update organisation contact info
     *
     * If !$data['CONTACT_INFO_ID'], add new otherwise update.
     *
     * @param int $id Organisation ID
     * @param array $data. https://api.insight.ly/v2.2/#!/Organisations/AddContactInfo for fields
     * @return object
     */
    public function saveOrganisationContactInfo($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be set.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.'() -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return !empty($data['CONTACT_INFO_ID']) ? $this->call('put','Organisations/'.$id.'/ContactInfos', $data) : $this->call('post','Organisations/'.$id.'/ContactInfos', $data);
    }
    public function saveOrganizationContactInfo($id = false, array $data = [])
    {
        return $this->saveOrganisationContactInfo($id, $data);
    }



    /**
     * Delete an organisation contact info
     *
     * @param int $id Organisation ID
     * @param int $id Info ID
     * @return void
     */
    public function deleteOrganisationContactInfo($id = false, $ci_id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }
        if(!$ci_id){
            $this->set_error(__FUNCTION__.'() -> Contact info $ci_id must be provided.');
        }

        return $this->call('delete', 'Organisations/'.$id.'/ContactInfos/'.$ci_id);
    }
    public function deleteOrganizationContactInfo($id = false, $ci_id = false)
    {
       return $this->deleteOrganisationContactInfo($id, $ci_id);
    }




    /**
     * Add / update organisation date
     *
     * If !$data['DATE_ID'], add new otherwise update.
     *
     * @param int $id Organisation ID
     * @param array $data. https://api.insight.ly/v2.2/#!/Organisations/AddDate for fields
     * @return object
     */
    public function saveOrganisationDate($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be set.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.'() -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return !empty($data['DATE_ID']) ? $this->call('put','Organisations/'.$id.'/Dates', $data) : $this->call('post','Organisations/'.$id.'/Dates', $data);
    }
    public function saveOrganizationDate($id = false, array $data = [])
    {
        return $this->saveOrganisationDate($id, $data);
    }



    /**
     * Delete an organisation date
     *
     * @param int $id Organisation ID
     * @param int $id Date ID
     * @return void
     */
    public function deleteOrganisationDate($id = false, $d_id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }
        if(!$d_id){
            $this->set_error(__FUNCTION__.'() -> Date $d_id must be provided.');
        }

        return $this->call('delete', 'Organisations/'.$id.'/Dates/'.$d_id);
    }
    public function deleteOrganizationDate($id = false, $d_id = false)
    {
       return $this->deleteOrganisationDate($id, $d_id);
    }



    /**
     * Update organisation custom field
     *
     * @param int $id Organisation ID
     * @param array $data. https://api.insight.ly/v2.2/#!/Organisations/UpdateCustomField for fields
     * @return object
     */
    public function updateOrganisationCustomField($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be set.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.'() -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('put','Organisations/'.$id.'/CustomFields', $data);
    }
    public function updateOrganizationCustomField($id = false, array $data = [])
    {
        return $this->updateOrganisationCustomField($id, $data);
    }



    /**
     * Delete organisation custom field
     *
     * @param int $id Organisation ID
     * @param string $cf_id Custom field ID
     * @return void
     */
    public function deleteOrganisationCustomField($id = false, $cf_id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be set.');
        }

        if(!$cf_id){
            $this->set_error(__FUNCTION__.'() -> $cf_id (Custom field ID) must be provided.');
        }

        return $this->call('put','Organisations/'.$id.'/CustomFields/'.$cf_id);
    }
    public function deleteOrganizationCustomField($id = false, $cf_id = false)
    {
        return $this->deleteOrganisationCustomField($id, $cf_id);
    }



    /**
     * Add organisation tag
     *
     * @param int $id Organisation ID
     * @param string $tag
     * @return object
     */
    public function addOrganisationTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be set.');
        }

        if(!$tag){
            $this->set_error(__FUNCTION__.'() -> $tag must be provided.');
        }

        return $this->call('post','Organisations/'.$id.'/Tags', ['TAG_NAME' => $tag]);
    }
    public function addOrganizationTag($id = false, $tag = false)
    {
        return $this->addOrganisationTag($id, $tag);
    }



    /**
     * Delete organisation tag
     *
     * @param int $id Organisation ID
     * @param string $tag
     * @return void
     */
    public function deleteOrganisationTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be set.');
        }

        if(!$tag){
            $this->set_error(__FUNCTION__.'() -> $tag must be provided.');
        }

        return $this->call('delete','Organisations/'.$id.'/Tags/'.$tag);
    }
    public function deleteOrganizationTag($id = false, $tag = false)
    {
        return $this->deleteOrganisationTag($id, $tag);
    }



    /**
     * Get Organisation Events
     *
     * @param int $id - Organisation ID
     * @return object
     */
    public function getOrganisationEvents($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }

        return $this->call('get','Organisations/'.$id.'/Events');
    }
    public function getOrganizationEvents($id = false)
    {
       return $this->getOrganisationEvents($id);
    }



    /**
     * Get Organisation Notes
     *
     * @param int $id - Organisation ID
     * @return object
     */
    public function getOrganisationNotes($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }

        return $this->call('get','Organisations/'.$id.'/Notes');
    }
    public function getOrganizationNotes($id = false)
    {
       return $this->getOrganisationNotes($id);
    }



    /**
     * Get Organisation Attachments
     *
     * @param int $id - Organisation ID
     * @return object
     */
    public function getOrganisationAttachments($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }

        return $this->call('get','Organisations/'.$id.'/FileAttachments');
    }
    public function getOrganizationAttachments($id = false)
    {
       return $this->getOrganisationAttachments($id);
    }



    /**
     * Get Organisation Emails
     *
     * @param int $id - Organisation ID
     * @return object
     */
    public function getOrganisationEmails($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }

        return $this->call('get','Organisations/'.$id.'/Emails');
    }
    public function getOrganizationEmails($id = false)
    {
       return $this->getOrganisationEmails($id);
    }



    /**
     * Get Organisation Tasks
     *
     * @param int $id - Organisation ID
     * @return object
     */
    public function getOrganisationTasks($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }

        return $this->call('get','Organisations/'.$id.'/Tasks');
    }
    public function getOrganizationTasks($id = false)
    {
       return $this->getOrganisationTasks($id);
    }



    /**
     * Get Organisation Follow Status
     *
     * @param int $id - Organisation ID
     * @return object
     */
    public function isFollowOrganisation($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }

        return $this->call('get','Organisations/'.$id.'/Follow');
    }
    public function isFollowOrganization($id = false)
    {
       return $this->isFollowOrganisation($id);
    }



    /**
     * Follow Organisation
     *
     * @param int $id - Organisation ID
     * @return object
     */
    public function followOrganisation($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }

        return $this->call('post','Organisations/'.$id.'/Follow');
    }
    public function followOrganization($id = false)
    {
       return $this->followOrganisation($id);
    }



    /**
     * Unfollow Organisation
     *
     * @param int $id - Organisation ID
     * @return object
     */
    public function unfollowOrganisation($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }

        return $this->call('delete','Organisations/'.$id.'/Follow');
    }
    public function unfollowOrganization($id = false)
    {
       return $this->unfollowOrganisation($id);
    }



    /**
     * Add activity to organisation
     *
     * @param int $id - Organisation ID
     * @param array $data - https://api.insight.ly/v2.2/#!/Organisations/AddActivitySetAssignment for fields
     * @return object
     */
    public function addOrganisationActivity($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.'() -> Organisation $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.'() -> $data must be provided.');
        }

        return $this->call('delete','Organisations/'.$id.'/Follow');
    }
    public function addOrganizationActivity($id = false)
    {
       return $this->addOrganisationActivity($id);
    }



}
