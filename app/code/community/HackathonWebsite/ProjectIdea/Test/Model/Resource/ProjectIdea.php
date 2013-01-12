<?php
class HackathonWebsite_ProjectIdea_Test_Model_Resource_ProjectIdea extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @var HackathonWebsite_ProjectIdea_Model_Resource_ProjectIdea
     */
    protected $model;

    public function setUp()
    {
        $this->model = Mage::getResourceModel('hackathonwebsite_projectidea/projectIdea');
    }

    public function testModelType()
    {
        $this->assertInstanceOf('HackathonWebsite_ProjectIdea_Model_Resource_ProjectIdea', $this->model);
    }

}