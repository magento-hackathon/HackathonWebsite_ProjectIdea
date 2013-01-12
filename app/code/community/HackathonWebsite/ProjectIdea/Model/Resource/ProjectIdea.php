<?php
class HackathonWebsite_ProjectIdea_Model_Resource_ProjectIdea extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Resource initialization
     */
    protected function _construct()
    {
        $this->_init('hackathonwebsite_projectidea/projectidea', 'project_id');
    }

}