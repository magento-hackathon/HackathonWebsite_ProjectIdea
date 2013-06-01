<?php
class HackathonWebsite_ProjectIdea_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function saveProjectIdToSession(HackathonWebsite_ProjectIdea_Model_ProjectIdea $projectIdea)
    {
        $projectIdeaIds = Mage::getSingleton('customer/session')->getProjectIdeaIds();
        $projectIdeaIds[$projectIdea->getId()] = $projectIdea->getId();
        Mage::getSingleton('customer/session')->setProjectIdeaIds($projectIdeaIds);
    }

    public function isCustomerOwnerOfProjectIdea(HackathonWebsite_ProjectIdea_Model_ProjectIdea $projectIdea)
    {
        $projectIdeaIds = Mage::getSingleton('customer/session')->getProjectIdeaIds();
        return array_key_exists($projectIdea->getId(), $projectIdeaIds);
    }
}