<?php

class HackathonWebsite_ProjectIdea_Test_Config_Main extends EcomDev_PHPUnit_Test_Case_Config
{
    public function testModelAlias()
    {
        $this->assertModelAlias(
            'hackathonwebsite_projectidea/projectIdea', 'HackathonWebsite_ProjectIdea_Model_ProjectIdea'
        );
    }

    public function testResourceModelAlias()
    {
        $this->assertResourceModelAlias(
            'hackathonwebsite_projectidea/projectIdea', 'HackathonWebsite_ProjectIdea_Model_Resource_ProjectIdea'
        );
    }

    public function testBlockAlias()
    {
        $this->assertBlockAlias('hackathonwebsite_projectidea/form', 'HackathonWebsite_ProjectIdea_Block_Form');
        $this->assertBlockAlias('hackathonwebsite_projectidea/list', 'HackathonWebsite_ProjectIdea_Block_List');
    }

    public function testVersion()
    {
        $this->assertModuleVersionGreaterThanOrEquals('1.0.0');
    }
}