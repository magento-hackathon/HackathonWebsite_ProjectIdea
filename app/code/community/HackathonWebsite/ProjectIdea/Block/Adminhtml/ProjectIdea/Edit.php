<?php
class HackathonWebsite_ProjectIdea_Block_Adminhtml_ProjectIdea_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'hackathonwebsite_projectidea';
        $this->_controller = 'adminhtml_projectIdea';
        $this->_mode = 'edit';
    }

    protected function  _prepareLayout()
    {
        $this->_updateButton('save', 'label', $this->__('Save Idea'));
        $this->_updateButton('delete', 'label', $this->__('Delete Idea'));

        $this->_addButton('saveandcontinue', array(
            'label'     => $this->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
        return parent::_prepareLayout();
    }

    public function getHeaderText()
    {
        /* @var $model HackathonWebsite_ProjectIdea_Model_ProjectIdea */
        if(($model = Mage::registry('current_projectidea')) && $model->getId()) {
            return $this->__("Edit Idea '%s'", $this->escapeHtml($model->getData('title')));
        } else {
            return $this->__('New Idea');
        }
    }
}