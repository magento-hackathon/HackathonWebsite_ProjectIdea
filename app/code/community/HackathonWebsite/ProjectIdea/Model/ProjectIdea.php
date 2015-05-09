<?php
class HackathonWebsite_ProjectIdea_Model_ProjectIdea extends Mage_Core_Model_Abstract
{
    /**
     * @var string
     */
    const FILTER_NO_REPO = 'no_repo';

    /**
     * @var string
     */
    const FILTER_REPO = 'repo';

    protected function _construct()
    {
        parent::_construct();
        $this->_init('hackathonwebsite_projectidea/projectIdea');
    }

}
