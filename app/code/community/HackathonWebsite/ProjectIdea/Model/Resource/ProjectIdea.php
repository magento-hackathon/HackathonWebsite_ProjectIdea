<?php
class HackathonWebsite_ProjectIdea_Model_Resource_ProjectIdea extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Resource initialization
     */
    protected function _construct()
    {
        $this->_init('hackathonwebsite_projectidea/projectidea', 'projectIdea_id');
    }

    protected function _beforeSave(Mage_Core_Model_Abstract $object)
    {
        if (!$object->getCreatedAt()) {
            $object->setCreatedAt($this->formatDate(time()));
        }

        if (!$object->getCustomerId()) {
            $object->setCustomerId(Mage::getSingleton('customer/session')->getCustomerId());
        }
        parent::_beforeSave($object);
    }

}