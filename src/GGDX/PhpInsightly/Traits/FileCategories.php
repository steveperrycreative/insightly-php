<?php namespace GGDX\PhpInsightly\Traits;

trait FileCategories{

    /**
     * Get file categories (or single if $id)
     *
     * @param int $id File Category ID
     * @return object
     */
    public function getFileCategories($id = false)
    {
        return !$id ? $this->call('get','FileFileCategories') : $this->call('get','FileFileCategories/'.$id);
    }


    /**
     * Create/Update file categories
     *
     * @param array $data - See https://api.insight.ly/v2.2/#!/FileCategories/AddFileCategory for fields
     * @return object
     */
    public function saveFileCategory(array $data = [])
    {
        return empty($data['CATEGORY_ID']) ? $this->call('post','FileFileCategories', $data) : $this->call('put','FileFileCategories', $data);
    }


    /**
     * Deactivate file category
     *
     * @param int $id File Category ID
     */
    public function deleteFileCategory($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }

        return $this->call('delete','FileCategories/'.$id);
    }
}
