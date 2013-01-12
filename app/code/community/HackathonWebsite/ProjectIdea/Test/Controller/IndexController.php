<?php
class HackathonWebsite_ProjectIdea_Test_Controller_IndexController extends EcomDev_PHPUnit_Test_Case_Controller
{
    public function testIndexAction()
    {
        $this->dispatch('projectIdea');
        $this->assertLayoutHandleLoaded('projectidea_index_index');
        $this->assertLayoutBlockCreated('form');
        $this->assertLayoutBlockRendered('form');
    }

    public function testListAction()
    {
        $this->dispatch('projectIdea/index/list');
        $this->assertLayoutHandleLoaded('projectidea_index_list');
        $this->assertLayoutBlockCreated('list');
        $this->assertLayoutBlockRendered('list');
    }

    public function testProjectSaveAction()
    {
        $title = 'My Title';
        $description = 'Beschreibung';
        $submitter = 'My Name';
        $this->getRequest()->setMethod('POST');
        $this->getRequest()->setPost(
            array(
                 'title'       => $title,
                 'description' => $description,
                 'submitter'   => $submitter
            )
        );
        $projectMock = $this->getModelMock(
            'hackathonwebsite_projectidea/projectIdea', array('save', 'setTitle', 'setDescription', 'setSubmitter')
        );
        $projectMock->expects($this->once())
            ->method('save');

        $projectMock->expects($this->once())->method('setTitle')->with($this->equalTo($title));
        $projectMock->expects($this->once())->method('setDescription')->with($this->equalTo($description));
        $projectMock->expects($this->once())->method('setSubmitter')->with($this->equalTo($submitter));

        $this->replaceByMock('model', 'hackathonwebsite_projectidea/projectIdea', $projectMock);

        $this->dispatch('projectIdea/index/post');

        $this->assertRequestDispatched();
        $this->assertRedirectTo('projectIdea/index/list');
    }

    public function testForwardWithoutPost()
    {
        $this->dispatch('projectIdea/index/post');
        $this->assertRedirectTo('projectIdea');
    }

    public function testWithoutSubmitter()
    {
        $title = 'My Title';
        $description = 'Beschreibung';
        $this->getRequest()->setMethod('POST');
        $this->getRequest()->setPost(
            array(
                 'title'       => $title,
                 'description' => $description,
            )
        );

        $this->dispatch('projectIdea/index/post');
        $this->assertRedirectTo('projectIdea');
    }

}