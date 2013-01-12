<?php
class HackathonWebsite_ProjectIdea_Test_Config_Model extends EcomDev_PHPUnit_Test_Case_Config {


    public function testResourceModelDefined() {
        $this->assertTableAlias('hackathonwebsite_projectidea/projectidea', 'hackathonwebsite_projectidea_projectidea');
    }
}