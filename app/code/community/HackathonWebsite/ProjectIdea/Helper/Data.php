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
        $isInSession = array_key_exists($projectIdea->getId(), $projectIdeaIds);
        $customerOwnsIdea = $projectIdea->getCustomerId() !== null
            && ($projectIdea->getCustomerId() == Mage::getSingleton('customer/session')->getCustomerId());
        return $isInSession || $customerOwnsIdea;
    }
}