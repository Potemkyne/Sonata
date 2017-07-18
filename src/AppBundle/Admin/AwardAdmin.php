<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AwardAdmin extends AbstractAdmin {

    //the default search result action chap 6
    protected $searchResultActions = array('edit', 'show');

    /**
     * chap 2 started 
     * chap 7 - 8.1 - 14 advanced
     * displayed fields on the edit and create actions
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->with('Award', array(
                    'class' => 'col-md-8',
                    'box_class' => 'box box-solid box-primary',
                    'description' => 'please complete all required fields',
                ))
                ->add('price', 'text')
                ->add('type', 'choice', array('choices' => array(
                        'won' => 'won',
                        'nominated' => 'nominated'),
                    'choices_as_values' => true, 'multiple' => false, 'expanded' => true
                ))
                ->add('year', 'text')
                ->end()
                ->with('Movie', array(
                    'class' => 'col-md-3',
                    'box_class' => 'box box-solid box-primary',
                ))
                ->add('movie', 'sonata_type_model', array(
                    'class' => 'AppBundle\Entity\Movie',
                    'property' => 'enTitle',
                ))
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
                ->add('price')
                ->add('year')
                ->add('type')
                ->add('movie', null, array(), 'entity', array(
                    'class' => 'AppBundle\Entity\Movie',
                    'choice_label' => 'frTitle',
                ))

        ;
    }

    /**
     * chap 2 - 4 started 
     * chap 7.6 advanced
     * Customizing the fields displayed on the list page
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('price')
                ->addIdentifier('year')
                 ->addIdentifier('type')
                ->add('movie.enTitle', null, array(
                    'header_class' => 'customActions',
                    'row_align' => 'left'
                ))
        ;
    }

    /**
     * chap 3.5 advanced
     * breadcrumb
     */
    public function toString($object) {
        return $object instanceof Award ? $object->getTitle() : 'Award';
    }

}
