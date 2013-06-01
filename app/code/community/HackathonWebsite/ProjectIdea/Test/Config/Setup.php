<?php
class HackathonWebsite_ProjectIdea_Test_Config_Setup extends EcomDev_PHPUnit_Test_Case_Config
{
    public function testSetupDefined() {
        $this->assertSetupResourceDefined();
        $this->assertSchemeSetupExists();
    }

    public function testSetupExists() {
        $this->assertSchemeSetupScriptVersions(null, '1.0.2');
    }
}