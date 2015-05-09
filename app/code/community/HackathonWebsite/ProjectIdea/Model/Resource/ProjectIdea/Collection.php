<?php
class HackathonWebsite_ProjectIdea_Model_Resource_ProjectIdea_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('hackathonwebsite_projectidea/projectIdea');
    }

    /**
     * @param string $filter
     * @return HackathonWebsite_ProjectIdea_Model_Resource_ProjectIdea_Collection
     */
    public function addFilters($filter)
    {
        switch ($filter) {
            case HackathonWebsite_ProjectIdea_Model_ProjectIdea::FILTER_NO_REPO:
                $this->addFieldToFilter('repository_url', array('null' => true));
                break;
            case HackathonWebsite_ProjectIdea_Model_ProjectIdea::FILTER_REPO:
                $this->addFieldToFilter('repository_url', array('notnull' => true));
                break;
        }
    }
}
