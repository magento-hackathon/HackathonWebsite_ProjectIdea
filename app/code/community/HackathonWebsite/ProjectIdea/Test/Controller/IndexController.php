<?php
class HackathonWebsite_ProjectIdea_Test_Controller_IndexController extends EcomDev_PHPUnit_Test_Case_Controller
{
    public function testIndexAction()
    {
        $this->dispatch('projectIdea');
        $this->assertLayoutHandleLoaded('projectidea_index_index');
        $this->assertLayoutBlockCreated('list');
        $this->assertLayoutBlockRendered('list');
    }

    public function testAddAction()
    {
        $this->dispatch('projectIdea/index/add');
        $this->assertLayoutHandleLoaded('projectidea_index_add');
        $this->assertLayoutBlockCreated('form');
        $this->assertLayoutBlockRendered('form');
    }

    public function testProjectSaveAction()
    {
        $title = 'My Title';
        $description = 'Beschreibung';
        $submitter = 'My Name';
        $repositoryUrl = 'http://github.com/';
        $this->getRequest()->setMethod('POST');
        $this->getRequest()->setPost(
            array(
                 'title'          => $title,
                 'description'    => $description,
                 'submitter'      => $submitter,
                 'repository_url' => $repositoryUrl
            )
        );
        $methods = array('save', 'setTitle', 'setDescription', 'setSubmitter', 'setRepositoryUrl');
        $projectMock = $this->getModelMock(
            'hackathonwebsite_projectidea/projectIdea', $methods
        );
        $projectMock->expects($this->once())
            ->method('save');

        $projectMock->expects($this->once())->method('setTitle')->with($this->equalTo($title));
        $projectMock->expects($this->once())->method('setDescription')->with($this->equalTo($description));
        $projectMock->expects($this->once())->method('setSubmitter')->with($this->equalTo($submitter));
        $projectMock->expects($this->once())->method('setRepositoryUrl')->with($this->equalTo($repositoryUrl));

        $this->replaceByMock('model', 'hackathonwebsite_projectidea/projectIdea', $projectMock);

        $this->dispatch('projectIdea/index/post');

        $this->assertRequestDispatched();
        $this->assertRedirectTo('projectIdea/index');
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
        $this->assertRedirectTo('projectIdea/index/add');
    }

    /**
     * @loadFixture projectIdea
     */
    public function testProjectIdeaList()
    {
        $this->dispatch('projectIdea/index');
        $this->assertLayoutBlockCreated('list');
        $this->assertLayoutBlockRendered('list');

        $this->assertResponseBodyContains('My cool projectidea'); // title
        $this->assertResponseBodyContains('Fabian Blechschmidt'); // submitter
        $this->assertResponseBodyContains('This is a short description of the project idea!'); // description
        $this->assertResponseBodyContains('http://github.com/'); // Repository URL
    }

}
