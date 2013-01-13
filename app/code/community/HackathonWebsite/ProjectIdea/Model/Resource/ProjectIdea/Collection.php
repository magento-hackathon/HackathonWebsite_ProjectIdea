<?php
class HackathonWebsite_ProjectIdea_Model_Resource_ProjectIdea_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('hackathonwebsite_projectidea/projectIdea');
    }

}