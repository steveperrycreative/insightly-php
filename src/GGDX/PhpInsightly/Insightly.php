<?php namespace GGDX\PhpInsightly;

class Insightly{

    use Traits\ActivitySets;
    use Traits\Comments;
    use Traits\Contacts;
    use Traits\Countries;
    use Traits\Currencies;
    use Traits\CustomFieldGroups;
    use Traits\CustomFields;
    use Traits\Emails;
    use Traits\Error;
    use Traits\Events;
    use Traits\FileAttachments;
    use Traits\FileCategories;
    use Traits\Follows;
    use Traits\Helpers;
    use Traits\Instance;
    use Traits\Leads;
    use Traits\LeadSources;
    use Traits\LeadStatus;
    use Traits\Milestones;
    use Traits\Notes;


    private $request, $api_version;

    public $error = [];


    /**
     * Initialise the Insightly class
     *
     * @param string $api_key
     * @param string $api_version
     * @return void
     */
    public function __construct($api_key = false, $api_version = false)
    {
        if(!$api_key){
            throw new Exception('Insightly API key required');
        }
        $this->request = new InsightlyRequest($api_key);

        $this->api_version = !$api_version ? 'v2.2' : $api_version;
    }

    /**
     * Send the request
     *
     * @param string $http_method - REST('get','post','put','delete')
     * @param string $endpoint
     * @param array $data
     * @return mixed
     */

    public function call($http_method = false, $endpoint = false, array $data = [])
    {
        if(!$http_method){
            $this->set_error('call() - $http_method is required');
        }

        if(!$endpoint){
            $this->set_error('call() - $endpoint is required');
        }

        if(count($this->error)){
            return $this->error;
        }

        $endpoint = $this->api_version.'/'.$endpoint;

        return !count($data) ? $this->request->$http_method($endpoint) : $this->request->$http_method($endpoint, $data);
    }
}
