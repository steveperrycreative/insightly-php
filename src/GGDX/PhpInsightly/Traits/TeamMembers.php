<?php namespace GGDX\PhpInsightly\Traits;

trait TeamMembers{

    /**
     * Get all Team Members (single record if $id)
     *
     * @param int $id - Team member ID
     * @return object
     */
    public function getTeamMembers($id = false)
    {
        return !$id ? $this->call('get','TeamMembers') : $this->call('get','TeamMembers/'.$id);
    }

    /**
     * Create Team Member
     *
     * @param array $data - See https://api.insight.ly/v2.2/#!/TeamMembers/AddTeamMember for fields
     * @return object
     */
    public function createTeamMember(array $data = [])
    {
        $data = $this->dataKeysToUpper($data);

        return $this->call('post','TeamMembers', $data);
    }


    /**
     * Delete Team Member
     *
     * @param int $id - Team member ID (NOT USER ID, It's the PERMISSION_ID)
     * @return void
     */
    public function deleteTeamMember($id = false)
    {
        if(!$id){
            $this->set_error(__FUNCTION__.' -> $id must be provided.');
        }
        return $this->call('delete','TeamMembers/'.$id);
    }
}
