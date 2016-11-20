<?php namespace GGDX\PhpInsightly\Traits;

trait Emails{

    /**
     * Get Emails
     *
     * If $id set, retrieve a single email.
     *
     * @param int $id Email ID
     * @return object
     */
    public function getEmails($id = false)
    {
        return !$id ? $this->call('get','Emails') : $this->call('get','Emails/'.$id);
    }


    /**
     * Add Email Tag
     *
     * @param int $id Email ID
     * @param string $tag Tag name
     * @return object
     */
    public function createEmailTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!$tag){
            $this->set_error(__FUNCTION__.' -> $tag must be provided.');
        }

        return $this->call('post','Emails/'.$id, ['TAG_NAME' => $tag]);
    }


    /**
     * Delete Email Tag
     *
     * @param int $id Email ID
     * @param string $tag Tag name
     * @return object
     */
    public function deleteEmailTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!$tag){
            $this->set_error(__FUNCTION__.' -> $tag must be provided.');
        }

        return $this->call('delete','Emails/'.$id.'/'.$tag);
    }


    /**
     * Get an emails' comments
     *
     * @param int $id Email ID
     * @return object
     */
    public function getEmailComments($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }
        return $this->call('get','Emails/'.$id.'/Comments');
    }


    /**
     * Add Comment to Email
     *
     * @param int $id Email ID
     * @param array $data - See https://api.insight.ly/v2.2/#!/Emails/AddComment for fields
     * @return object
     */
    public function createEmailComment($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('post','Emails/'.$id.'/Comments', $data);
    }


    /**
     * Stop following email
     *
     * @param int $id Email ID
     * @return void
     */
    public function unfollowEmail($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Emails/'.$id.'/Follow');
    }


    /**
     * Check email following status
     *
     * @param int $id Email ID
     * @return object
     */
    public function isEmailFollowed($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Emails/'.$id.'/Follow');
    }


    /**
     * Follow email
     *
     * @param int $id Email ID
     * @return object
     */
     public function followEmail($id = false)
     {
         if(!$id){
             $this->set_error(__FUNCTION__.' -> $id must be provided.');
         }

         return $this->call('post','Emails/'.$id.'/Follow');
     }


     /**
      * Get email attachments
      *
      * @param int $id Email ID
      * @return object
      */
      public function getEmailAttachment($id = false)
      {
          if(!$id){
              $this->set_error(__FUNCTION__.' -> $id must be provided.');
          }

          return $this->call('get','Emails/'.$id.'/FileAttachments');
      }

}
