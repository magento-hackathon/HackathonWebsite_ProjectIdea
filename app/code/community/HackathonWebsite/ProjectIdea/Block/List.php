<?php
class HackathonWebsite_ProjectIdea_Block_List extends Mage_Core_Block_Template
{
    /**
     * @var HackathonWebsite_ProjectIdea_Model_Resource_ProjectIdea_Collection
     */
    protected $_collection;

    /**
     * prepare collection
     *
     * @return HackathonWebsite_ProjectIdea_Block_List
     */
    protected function _beforeToHtml()
    {
        $return = parent::_beforeToHtml();

        $this->_collection = Mage::getResourceModel('hackathonwebsite_projectidea/projectIdea_collection');
        $this->_collection->addOrder('projectIdea_id', HackathonWebsite_ProjectIdea_Model_Resource_ProjectIdea_Collection::SORT_ORDER_DESC);

        return $return;
    }

    /**
     * @return HackathonWebsite_ProjectIdea_Model_Resource_ProjectIdea_Collection
     */
    public function getProjectIdeaCollection()
    {
        return $this->_collection;
    }
}