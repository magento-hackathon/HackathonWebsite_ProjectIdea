<?php
class HackathonWebsite_ProjectIdea_Model_ProjectIdea extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('hackathonwebsite_projectidea/projectIdea');
    }

}