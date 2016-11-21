<?php namespace GGDX\PhpInsightly\Traits;

trait TaskCategories{

    /**
     * Get all Task Categories
     *
     * @param int $id - Task category ID
     * @return object
     */
    public function getTaskCategories($id = false)
    {
        return !$id ? $this->call('get','TaskCategories') : $this->call('get','TaskCategories/'.$id);
    }

    /**
     * Create / Update Task Category
     *
     * @param array $data - See https://api.insight.ly/v2.2/#!/TaskCategories/AddTaskCategory for fields
     * @return object
     */
    public function saveTaskCategory(array $data = [])
    {
        $data = $this->dataKeysToUpper($data);

        return empty($data['CATEGORY_ID']) ? $this->call('post','TaskCategories', $data) : $this->call('put','TaskCategories', $data);
    }


    /**
     * Disable Task Category
     *
     * @param int $id
     * @return void
     */
    public function deleteTaskCategory($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }
        return $this->call('delete','TaskCategories/'.$id);
    }
}
