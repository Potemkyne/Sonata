<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CompanyAdmin extends AbstractAdmin {

    //the default search result action chap 6
    protected $searchResultActions = array('edit', 'show');

    /**
     * chap 2 started 
     * chap 7 - 8.1 - 14 advanced
     * displayed fields on the edit and create actions
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->with('Production', array(
                    'class' => 'col-md-8',
                    'box_class' => 'box box-solid box-primary',
                    'description' => 'please complete all required fields',
                ))
                ->add('name', 'text')
                ->end()

        ;
    }

    /**
     * chap 2 - 4 started 
     * chap 7.6 advanced
     * Customizing the fields displayed on the list page
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('name','text')
              

        ;
    }

    /**
     * chap 2 - 4.2 started 
     * chap 7.5 advanced
     *  add filters to let user control which data will be displayed
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('name')
               
        ;
    }

    /**
     * chap 3.5 advanced
     * breadcrumb
     */
    public function toString($object) {
        return $object instanceof Company ? $object->getTitle() : 'Company';
    }

}
