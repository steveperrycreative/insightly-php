<?php namespace GGDX\PhpInsightly\Traits;

/*
* @TODO - Add add_file_attachment method.
*/

trait Comments{


    /**
     * Get comment
     *
     * @param int $id Comment ID
     * @return object
     */
    public function getComment($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Comments/'.$id);
    }

    /**
     * Get comment attachment
     *
     * @param int $id Comment ID
     * @return object
     */
    public function getCommentAttachment($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Comments/'.$id.'/FileAttachments');
    }


    /**
     * Update comment
     *
     * @param int $id Comment ID
     * @param string $body Comment body
     * @return object
     */
    public function updateComment($id = false, $body = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!$body || strlen($body) < 1){
            $this->set_error(__FUNCTION__.' -> $body must be set.');
        }

        return $this->call('put','Comments/'.$id, ['BODY' => $body]);
    }


    /**
     * Delete comment
     *
     * @param int $id Comment ID
     * @return object
     */
    public function deleteComment($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }
        return $this->call('delete','Comments/'.$id);
    }
}
