<?php
class HackathonWebsite_ProjectIdea_Test_Config_Controller extends EcomDev_PHPUnit_Test_Case_Config
{
    public function testRoute()
    {
        $this->assertRouteFrontName('projectIdea');
    }

    public function testLayoutAdded() {
        $this->assertLayoutFileDefined('frontend', 'hackathonwebsite_projectidea.xml');
        $this->assertLayoutFileExists('frontend', 'hackathonwebsite_projectidea.xml');
    }


}