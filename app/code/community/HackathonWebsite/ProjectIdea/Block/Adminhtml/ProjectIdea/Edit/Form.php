<?php
class HackathonWebsite_ProjectIdea_Block_Adminhtml_ProjectIdea_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));

        $form->setHtmlIdPrefix('general');
        $fieldset = $form->addFieldset('general_form', array('legend' => $this->__('General')));

        if (Mage::registry('current_projectidea')->getId()) {
            $fieldset->addField('projectIdea_id', 'label', array(
                'label' => $this->__('Idea ID:'),
            ));
        }

        $fieldset->addField('submitter', 'text', array(
            'label'     => $this->__('Submitter:'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'submitter',
        ));

        $fieldset->addField('title', 'text', array(
            'label'     => $this->__('Title:'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'title',
        ));

        $fieldset->addField('description', 'text', array(
            'label'     => $this->__('Description:'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'description',
        ));

        $form->addValues($this->_getFormData());

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     *
     * @return array
     */
    protected function _getFormData()
    {
        $data = Mage::getSingleton('adminhtml/session')->getFormData();

        if (!$data && Mage::registry('current_projectidea')->getData()) {
            $data = Mage::registry('current_projectidea')->getData();
        }

        return (array) $data;
    }
}