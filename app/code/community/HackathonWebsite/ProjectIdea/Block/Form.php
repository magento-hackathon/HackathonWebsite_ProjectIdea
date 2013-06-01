<?php
/**
 * Class HackathonWebsite_ProjectIdea_Block_Form
 *
 * @method int getProjectIdeaId
 */
class HackathonWebsite_ProjectIdea_Block_Form extends Mage_Core_Block_Template
{
    protected $_projectIdea;

    public function getProjectIdea()
    {
        if (!$this->_projectIdea) {
            $this->_projectIdea = Mage::getModel('hackathonwebsite_projectidea/projectIdea')->load(
                $this->getProjectIdeaId()
            );
        }
        // if the user doesn't own the idea, reset it
        if (!Mage::helper('hackathonwebsite_projectidea')->isCustomerOwnerOfProjectIdea($this->_projectIdea)) {
            $this->_projectIdea = Mage::getModel('hackathonwebsite_projectidea/projectIdea');
        }
        return $this->_projectIdea;
    }
}