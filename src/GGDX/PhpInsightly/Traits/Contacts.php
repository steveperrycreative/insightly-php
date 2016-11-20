<?php namespace GGDX\PhpInsightly\Traits;

/*
* @TODO - Add addContactImage method.
*/

trait Contacts{

    /**
     * Get single contact
     *
     * If $id - get single record, otherwise get all.
     *
     * @param int $id Contact ID
     * @return object
     */
    public function getContacts($id = false)
    {
       if($id != false){
           $this->set_error(__FUNCTION__.' -> $id must be provided.');
       }

       return $this->call('get','Contacts/'.$id);
    }


    /**
     * Add / Update contact
     *
     * @param array $data - For fields, see https://api.insight.ly/v2.2/#!/Contacts/AddContact
     * @return object
     */
    public function saveContact(array $data = [])
    {
        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must have stuff in it.');
        }

        $data = $this->dataKeysToUpper($data);

        return !$id ? $this->call('post','Contacts', $data) : $this->call('put','Contacts', $data);
    }


    /**
     * Delete contact
     *
     * @param int $id Contact ID (REQUIRED)
     * @return void
     */
    public function deleteContact($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        return $this->call('delete','Contacts/'.$id);
    }


    /**
     * Get contact image
     *
     * @param int $id Contact ID
     * @return object
     */
    public function getContactImage($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        return $this->call('get','Contacts/'.$id.'/Image');
    }


    /**
     * Delete contact image
     *
     * @param int $id Contact ID
     * @return void
     */
    public function deleteContactImage($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        return $this->call('delete','Contacts/'.$id.'/Image');
    }


    /**
     * Create / update contact address
     *
     * @param int $id Contact ID.
     * @param array $data - For fields, see https://api.insight.ly/v2.2/#!/Contacts/AddAddress
     * @return object
     */
    public function saveContactAddress($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        $data = $this->dataKeysToUpper($data);

        return empty($data['ADDRESS_ID']) ? $this->call('post','Contacts/'.$id.'/Addresses', $data) : $this->call('put','Contacts/'.$id.'/Addresses', $data);
    }


    /**
     * Delete contact address
     *
     * @param int $id User ID
     * @param int $address_id Address ID.
     */
    public function deleteContactAddress($id = false, $address_id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }
        if(!$address_id){
            $this->set_error(__FUNCTION__.' -> $address_id must be set.');
        }

        return $this->call('delete','Contacts/'.$id.'/Addresses/'.$address_id);
    }


    /**
     * Add / update contact info
     *
     * If !$data['CONTACT_INFO_ID'], add new otherwise update.
     *
     * @param array $data. For fields - https://api.insight.ly/v2.2/#!/Contacts/AddContactInfo
     * @param int $id Contact ID.
     * @return object
     */
    public function saveContactInfo(array $data = [], $id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return !empty($data['CONTACT_INFO_ID']) ? $this->call('put','Contacts/'.$id.'/ContactInfos', $data) : $this->call('post','Contacts/'.$id.'/ContactInfos', $data);
    }


    /**
     * Delete contact info
     *
     * @param int $id User ID
     * @param int $info_id Info ID.
     * @return void
     */
    public function deleteContactInfo($id = false, $info_id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }
        if(!$info_id){
            $this->set_error(__FUNCTION__.' -> $info_id must be set.');
        }

        return $this->call('delete','Contacts/'.$id.'/ContactInfos/'.$info_id);
    }


    /**
     * Save contact date entry
     *
     * !$data['DATE_ID'] = create, otherwise update
     *
     * @param int $id Contact ID
     * @param int $data - See https://api.insight.ly/v2.2/#!/Contacts/AddDate for fields
     * @return object
     */
    public function saveContactDate($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        $data = $this->dataKeysToUpper($data);

        return !empty($data['DATE_ID']) ? $this->call('put','Contacts/'.$id.'/Dates', $data) : $this->call('post','Contacts/'.$id.'/Dates', $data);
    }


    /**
     * Delete contact date entry
     *
     * @param int $id User ID
     * @param int $date_id Date ID.
     * @return void
     */
    public function deleteContactDate($id = false, $date_id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }
        if(!$date_id){
            $this->set_error(__FUNCTION__.' -> $date_id must be set.');
        }

        return $this->call('delete','Contacts/'.$id.'/Dates/'.$date_id);
    }



    /**
     * Update contact custom field
     *
     * @param int $id Contact ID
     * @param array $data - See https://api.insight.ly/v2.2/#!/Contacts/UpdateCustomField for fields
     * @return object
     */
    public function updateContactCustomField($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be set.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('put','Contacts/'.$id.'/CustomFields',$data);
    }


    /**
     * Delete contact custom field
     *
     * @param int $id User ID
     * @param int $cf_id Date ID.
     * @return void
     */
    public function deleteContactCustomField($id = false, $cf_id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        if(!$cf_id){
            $this->set_error(__FUNCTION__.' -> $cf_id must be set.');
        }

        return $this->call('delete','Contacts/'.$id.'/CustomFields/'.$cf_id);
    }


    /**
     * Add tag to contact
     *
     * @param int $id User ID
     * @param string $tag Tag name
     * @return object
     */
    public function addContactTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        if(!$tag){
            $this->set_error(__FUNCTION__.' -> $tag must be set.');
        }

        return $this->call('post','Contacts/'.$id.'/Tags', ['TAG_NAME' => $tag]);
    }


    /**
     * Delete contact tag
     *
     * @param int $id User ID
     * @param string $tag Tag name
     * @return void
     */
    public function deleteContactTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        if(!$tag){
            $this->set_error(__FUNCTION__.' -> $tag must be set.');
        }

        return $this->call('delete','Contacts/'.$id.'/Tags/'.$tag);
    }


    /**
     * Get contact events
     *
     * @param int $id Contact ID
     * @return object
     */
    public function getContactEvents($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        return $this->call('get','Contacts/'.$id.'/Events');
    }


    /**
     * Get contact notes
     *
     * @param int $id Contact ID
     * @return object
     */
    public function getContactNotes($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        return $this->call('get','Contacts/'.$id.'/Notes');
    }


    /**
     * Create contact note
     *
     * @param int $id Contact ID
     * @param array $data - See https://api.insight.ly/v2.2/#!/Contacts/AddNote for fields
     * @return object
     */
    public function createContactNote($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be set.');
        } else {
            $data = $this->dataKeysToUpper($data);

        }

        return $this->call('post','Contacts/'.$id.'/Notes', $data);
    }


    /**
     * Get contact emails
     *
     * @param int $id Contact ID
     * @return object
     */
    public function getContactEmails($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        return $this->call('get','Contacts/'.$id.'/Emails');
    }


    /**
     * Get contact Tasks
     *
     * @param int $id Contact ID
     * @return object
     */
    public function getContactTasks($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be set.');
        }

        return $this->call('get','Contacts/'.$id.'/Tasks');
    }
}
