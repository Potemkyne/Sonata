<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CastAdmin extends AbstractAdmin {

    //the default search result action chap 6
    protected $searchResultActions = array('edit', 'show');

    /**
     * chap 2 started 
     * chap 7 - 8.1 - 14 advanced
     * displayed fields on the edit and create actions
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->with('Cast', array(
                    'class' => 'col-md-8',
                    'box_class' => 'box box-solid box-primary',
                    'description' => 'veuillez renseigner ces champs svp',
                ))
                ->add('firstName', 'text')
                ->add('lastName', 'text')
                ->add('carreer', 'textarea')
                ->add('picture', 'file')
                ->add('alt', 'text')
                ->add('birthDate', 'birthday')
                ->end()

        ;
    }

    /**
     * chap 2 - 4.2 started 
     * chap 7.5 advanced
     *  add filters to let user control which data will be displayed
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('firstName')
                ->add('lastName')
                ->add('carreer')
                ->add('picture')
                ->add('alt')
                ->add('birthDate')

        ;
    }

    /**
     * chap 2 - 4 started 
     * chap 7.6 advanced
     * Customizing the fields displayed on the list page
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('firstName')
                ->addIdentifier('lastName')
                ->addIdentifier('carreer')
                ->addIdentifier('picture')
                ->addIdentifier('alt')
                ->addIdentifier('birthDate')

        ;
    }

    /**
     * chap 3.5 advanced
     * breadcrumb
     */
    public function toString($object) {
        return $object instanceof Cast ? $object->getTitle() : 'Cast';
    }

}
