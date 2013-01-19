<?php
class HackathonWebsite_ProjectIdea_Block_Adminhtml_ProjectIdea extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected $_addButtonLabel = 'Add New Example';

    public function __construct()
    {
        $this->_controller = 'adminhtml_projectIdea';
        $this->_blockGroup = 'hackathonwebsite_projectidea';
        $this->_headerText = $this->__('Project Ideas');
        $this->_addButtonLabel = $this->__('Add Idea');

        parent::__construct();
    }

}