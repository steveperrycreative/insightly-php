<?php namespace GGDX\PhpInsightly\Traits;

trait FileAttachments{

    /**
     * Get attachment
     *
     * @param int $id Attachment ID
     * @return object
     */
    public function getAttachment($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }
        return $this->call('get','FileAttachments/'.$id);
    }


    /**
     * Delete attachment
     *
     * @param int $id Attachment ID
     * @return void
     */
    public function deleteAttachment($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }
        return $this->call('delete','FileAttachments/'.$id);
    }
}
