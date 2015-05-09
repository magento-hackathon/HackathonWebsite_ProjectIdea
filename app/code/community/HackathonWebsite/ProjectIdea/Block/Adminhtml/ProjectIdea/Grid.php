<?php
class HackathonWebsite_ProjectIdea_Block_Adminhtml_ProjectIdea_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('projectIdea_grid');
        $this->setDefaultSort('projectIdea_id');
        $this->setDefaultDir('desc');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('hackathonwebsite_projectidea/projectIdea')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn(
            'projectIdea_id', array(
                               'header' => Mage::helper('hackathonwebsite_projectidea')->__('ID'),
                               'align'  => 'right',
                               'width'  => '50px',
                               'index'  => 'projectIdea_id',
                          )
        );

        $this->addColumn(
            'title', array(
                          'header' => Mage::helper('hackathonwebsite_projectidea')->__('Title'),
                          'align'  => 'left',
                          'index'  => 'title',
                     )
        );

        $this->addColumn(
            'description', array(
                                'header' => Mage::helper('hackathonwebsite_projectidea')->__('Description'),
                                'align'  => 'left',
                                'index'  => 'description',
                           )
        );

        $this->addColumn(
            'repository_url', array(
                                'header' => Mage::helper('hackathonwebsite_projectidea')->__('Repository URL'),
                                'align'  => 'left',
                                'index'  => 'repository_url',
                           )
        );

        $this->addColumn(
            'submitter', array(
                              'header' => Mage::helper('hackathonwebsite_projectidea')->__('Submitter'),
                              'align'  => 'left',
                              'index'  => 'submitter',
                         )
        );

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('projectIdea_id');
        $this->getMassactionBlock()->setFormFieldName('projectIdea_id');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'    => $this->__('Delete'),
            'url'      => $this->getUrl('*/*/massDelete'),
            'confirm'  => $this->__('Are you sure?')
        ));

        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
