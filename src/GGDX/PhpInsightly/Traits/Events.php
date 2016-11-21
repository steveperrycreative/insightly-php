<?php namespace GGDX\PhpInsightly\Traits;

trait Events{

    /**
     * Get all events (singular if $id)
     *
     * @param int $id Event ID
     * @return object
     */
    public function getEvents($id = false)
    {
        return !$id ? $this->call('get','Events') : $this->call('get','Events/'.$id);
    }

    /**
     * Get single event
     *
     * @param int $id Event ID
     * @return object
     */
    public function getEvent($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->getEvents($id);
    }


    /**
     * Create/Update event
     *
     * @param int $id Event ID
     * @param array $data - See https://api.insight.ly/v2.2/#!/Events/AddEvent for fields
     * @return object
     */
    public function saveEvent(array $data = [])
    {
        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return empty($data['EVENT_ID']) ? $this->call('post','Events', $data) : $this->call('put','Events', $data);
    }


    /**
     * Delete event
     *
     * @param int $id Event ID
     */
    public function deleteEvent($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete', 'Events/'.$id);
    }
}
