<?php namespace GGDX\PhpInsightly\Traits;

trait TaskCategories{

    /**
     * Get all Tasks
     *
     * @param int $id - Task category ID
     * @return object
     */
    public function getTasks($id = false)
    {
        return !$id ? $this->call('get','Tasks') : $this->call('get','Tasks/'.$id);
    }

    /**
     * Create / Update Task
     *
     * @param array $data - See https://api.insight.ly/v2.2/#!/Tasks/AddTask for fields
     * @return object
     */
    public function saveTask(array $data = [])
    {
        $data = $this->dataKeysToUpper($data);

        return empty($data['TASK_ID']) ? $this->call('post','Tasks', $data) : $this->call('put','Tasks', $data);
    }


    /**
     * Disable Task
     *
     * @param int $id
     * @return void
     */
    public function deleteTask($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }
        return $this->call('delete','Tasks/'.$id);
    }


    /**
     * Get task comments
     *
     * @param int $id - Task category ID
     * @return object
     */
    public function getTaskComments($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Tasks/'.$id.'/Comments');
    }


    /**
     * Add task comment
     *
     * @param int $id - Task category ID
     * @param array $data - See https://api.insight.ly/v2.2/#!/Tasks/AddComment for fields
     * @return object
     */
    public function createTaskComment($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error(__FUNCTION__.' -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);
        }

        return $this->call('post','Tasks/'.$id.'/Comments', $data);
    }


    /**
     * Follow task
     *
     * @param int $id - Task category ID
     * @return object
     */
    public function followTask($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('post','Tasks/'.$id.'/Follow');
    }


    /**
     * Unfollow task
     *
     * @param int $id - Task category ID
     * @return object
     */
    public function followTask($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','Tasks/'.$id.'/Follow');
    }


    /**
     * Get task follow record
     *
     * @param int $id - Task category ID
     * @return object
     */
    public function isFollowTask($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('get','Tasks/'.$id.'/Follow');
    }
}
