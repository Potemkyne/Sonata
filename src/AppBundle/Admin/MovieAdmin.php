<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MovieAdmin extends AbstractAdmin {

    //the default search result action chap 6
    protected $searchResultActions = array('edit', 'show');

    /**
     * chap 2 started 
     * chap 7 - 8.1 - 14 advanced
     * displayed fields on the edit and create actions
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->with('Movie', array(
                    'class' => 'col-md-8',
                    'box_class' => 'box box-solid box-primary',
                    'description' => 'please complete all required fields',
                ))
                ->add('frTitle', null, array(
                    'help' => 'Set the french title of the movie'
                ))
                ->add('enTitle', 'text')
                ->add('plot', 'textarea')
                ->add('screenplay', 'text')
                ->add('runningTime', 'time', ['placeholder' => ['hour' => 'Hour', 'minute' => 'Minute'], 'hours' => range(0, 2)])
                ->add('releaseDate', 'date', ['years' => range(1910, 1985), 'placeholder' => ['year' => 'Year', 'month' => 'Month', 'day' => 'Day']])
                ->add('language', 'language')
                ->add('music', 'text', array(
                    'required' =>
                    false
                ))
                ->add('country', 'country')
                ->end()
                ->with('Casting', array(
                    'class' => 'col-md-4',
                    'box_class' => 'box box-solid box-primary',
                ))
                ->add('casts', 'sonata_type_collection', array(), array(
                    'class' => 'AppBundle\Entity\Cast',
                ))
                ->end()
                ->with('Producer', array(
                    'class' => 'col-md-4',
                    'box_class' => 'box box-solid box-primary',
                ))
                ->add('companies', 'sonata_type_collection', array(), array(
                    'class' => 'AppBundle\Entity\Company',
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
        $datagridMapper->add('frTitle')
                ->add('enTitle')
                ->add('plot')
                ->add('runningTime')
                ->add('releaseDate')
                ->add('music')
                 ->add('screenplay')
                ->add('country')
                ->add('language')
                
        ;
    }

    /**
     * chap 2 - 4 started 
     * chap 7.6 advanced
     * Customizing the fields displayed on the list page
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->addIdentifier('frTitle')
                ->addIdentifier('enTitle')
                ->addIdentifier('plot')
                 ->addIdentifier('screenplay')
                ->addIdentifier('runningTime')
                ->addIdentifier('releaseDate')
                ->addIdentifier('music')
                ->addIdentifier('country')
                ->addIdentifier('language')

        ;
    }

    /**
     * chap 3.5 advanced
     * breadcrumb
     */
    public function toString($object) {
        return $object instanceof Movie ? $object->getTitle() : 'Movie';
    }

}
