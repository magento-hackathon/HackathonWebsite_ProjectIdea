<?php
class HackathonWebsite_ProjectIdea_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();

        $this->renderLayout();
    }

    public function addAction()
    {
        $this->loadLayout();

        $this->renderLayout();
    }

    public function postAction()
    {
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->_redirect('projectIdea');
        }

        $data = $this->getRequest()->getPost();
        $session = Mage::getSingleton('customer/session');
        $error = false;
        if (empty($data['title'])) {
            $session->addError($this->__('Please enter a title'));
            $error = true;
        }

        if (empty($data['submitter'])) {
            $session->addError($this->__('Please enter a name'));
            $error = true;
        }

        if ($error) {
            /* @var $session Mage_Customer_Model_Session */
            return $this->_redirect('projectIdea');
        }

        /* @var $projectIdea HackathonWebsite_ProjectIdea_Model_ProjectIdea */
        $projectIdea = Mage::getModel('hackathonwebsite_projectidea/projectIdea');
        $projectIdea->setTitle($data['title']);
        $projectIdea->setDescription($data['description']);
        $projectIdea->setSubmitter($data['submitter']);
        $projectIdea->save();

        if(!Mage::helper('customer')->isLoggedIn()) {
            // if we don't save a customer_id with the project ids save it to the session
            Mage::helper('hackathonwebsite_projectidea')->saveProjectIdToSession($projectIdea);
        }

        return $this->_redirect('projectIdea/index');
    }
}