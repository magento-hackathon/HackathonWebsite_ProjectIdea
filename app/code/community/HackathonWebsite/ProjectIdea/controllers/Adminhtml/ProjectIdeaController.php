<?php
class HackathonWebsite_ProjectIdea_Adminhtml_ProjectIdeaController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();

        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $model = Mage::getModel('hackathonwebsite_projectidea/projectIdea');
        Mage::register('current_projectidea', $model);
        $id = $this->getRequest()->getParam('id');

        try{
            if($id){
                if(!$model->load($id)->getId()){
                    Mage::throwException($this->__('No record with ID "%s" found.', $id));
                }
            }

            $pageTitle = $model->getId() ? $this->__('Edit Idea (%s)', $model->getId()) : $this->__('New Idea');
            $this->_title($pageTitle);
            $this->loadLayout();
            $this->renderLayout();
        }catch(Exception $e){
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
            $this->_redirect('*/*');
        }
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            $this->_getSession()->setFormData($data);
            $model = Mage::getModel('hackathonwebsite_projectidea/projectIdea');
            $id = $this->getRequest()->getParam('id');

            try {
                $model->load($id)
                    ->addData($data)
                    ->save();

                if (!$model->getId()) {
                    Mage::throwException($this->__('Error saving idea'));
                }

                $this->_getSession()->addSuccess($this->__('Idea was successfully saved'));
                $this->_getSession()->setFormData(array());

                if ($this->getRequest()->getParam('back')) {
                    $params = array('id' => $model->getId());
                    $this->_redirect('*/*/edit', $params);
                } else {
                    $this->_redirect('*/*');
                }
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                if ($model && $model->getId()) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/new');
                }
            }

            return;
        }

        $this->_getSession()->addError($this->__('No data found to save'));
        $this->_redirect('*/*');
    }

    public function deleteAction()
    {
        /** @var $model HackathonWebsite_ProjectIdea_Model_ProjectIdea */
        $model = Mage::getModel('hackathonwebsite_projectidea/projectIdea');
        $id = $this->getRequest()->getParam('id');

        try {
            if ($id) {
                if (!$model->load($id)->getId()) {
                    Mage::throwException($this->__('No record with ID "%s" found.', $id));
                }
                $title = $model->getData('title');
                $model->delete();
                $this->_getSession()->addSuccess($this->__('"%s" (ID %d) was successfully deleted', $title, $id));
            }
        } catch (Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
        }

        $this->_redirect('*/*');
    }

    public function massDeleteAction()
    {
        if ($idea_ids = $this->getRequest()->getPost('projectIdea_id')) {
            $deleted = 0;
            /** @var $model HackathonWebsite_ProjectIdea_Model_ProjectIdea */
            $model = Mage::getModel('hackathonwebsite_projectidea/projectIdea');
            foreach ((array) $idea_ids as $id) {
                $model->setId($id)
                    ->delete();
                $deleted++;
            }
            $this->_getSession()->addSuccess(
                $this->__('%s idea(s) deleted.', $deleted)
            );
        }

        $this->_redirect('*/*');
    }
}