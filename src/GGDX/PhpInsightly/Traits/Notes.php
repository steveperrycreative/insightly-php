<?php namespace GGDX\PhpInsightly\Traits;

trait Notes{

    /**
     * Get all notes (single note if $id)
     *
     * @param int $id Note ID
     * @return object
     */
    public function getNotes($id = false)
    {
        return !$id ? $this->call('get','Notes') : $this->call('get','Notes/'.$id);
    }


    /**
     * Create/Save Note
     *
     * To update, make sure that $data['NOTE_ID'] is set, otherwise new note is created.
     *
     * @param array $data - See https://api.insight.ly/v2.2/#!/Notes/UpdateNote
     * @return object
     */
    public function saveNote(array $data = [])
    {
        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        }

        $data = $this->dataKeysToUpper($data);

        return empty($data['NOTE_ID']) ? $this->call('post','Notes',$data) : $this->call('put','Notes',$data);
    }


    /**
     * Delete note
     *
     * @param int $id Note ID
     * @return void
     */
    public function deleteNote($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Notes/'.$id);
    }


    /**
     * Get note comments
     *
     * @param int $id Note ID
     * @return object
     */
    public function getNoteComments($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Notes/'.$id.'/Comments');
    }


    /**
     * Add note comment
     *
     * @param int $id Note ID
     * @param array $data - See https://api.insight.ly/v2.2/#!/Notes/AddComment for fields
     * @return object
     */
    public function addNoteComment($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        }

        return $this->call('post','Notes/'.$id.'/Comments', $data);
    }


    /**
     * Unfollow note
     *
     * @param int $id Note ID
     * @return void
     */
    public function unfollowNote($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Notes/'.$id.'/Follow');
    }


    /**
     * Follow note
     *
     * @param int $id Note ID
     * @return object
     */
    public function followNote($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('post','Notes/'.$id.'/Follow');
    }


    /**
     * Follow note record (i.e. Am I following this note?)
     *
     * @param int $id Note ID
     * @return object
     */
    public function isFollowNote($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Notes/'.$id.'/Follow');
    }


    /**
     * Get note attachments
     *
     * @param int $id Note ID
     * @return object
     */
    public function getNoteAttachments($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Notes/'.$id.'/FileAttachments');
    }
}
