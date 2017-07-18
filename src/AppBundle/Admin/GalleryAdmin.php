<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\DoctrineORMAdminBundle\Filter\ChoiceFilter;
use AppBundle\Form\GalleryType;
use Symfony\Component\HttpFoundation\Request;

class GalleryAdmin extends AbstractAdmin {

//the default search result action chap 6
    protected $searchResultActions = array('edit', 'show');
// chap 7
    protected $datagridValues = array(
// display the first page (default = 1)
        '_page' => 1,
        // reverse order (default = 'ASC')
        '_sort_order' => 'DESC',
        // name of the ordered field (default = the model's id field, if any)
        '_sort_by' => 'alt',
    );

    /**
     * chap 2 started 
     * chap 7 - 8.1 - 14 advanced
     * displayed fields on the edit and create actions
     */
    protected function configureFormFields(FormMapper $formMapper) {

        $imageFieldOptions = array();


        $formMapper
                ->with('Image', array(
                    'class' => 'col-md-9',
                    'box_class' => 'box box-solid box-primary',
                    'description' => 'please complete all required fields',
                ))
                ->add('type', 'choice', array('choices' => array(
                        'poster' => 'poster',
                        'photogram' => 'photogram',
                        'Movie Set Pictures' => 'moviesetpictures'),
                    'choices_as_values' => true, 'multiple' => false, 'expanded' => true
                ))
                ->add('path', 'file', array(
                    'label' => 'image'
                ))
                ->add('alt', 'text', array(
                    'label' => 'alt'
                ))
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
     * chap 2 - 4 started 
     * chap 7.6 advanced
     * Customizing the fields displayed on the list page
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('type', 'text', array(
                    'header_style' => 'width: 35%',
                    'collapse' => array(
                        'height' => 40, // height in px
                       
            )))
                ->add('movie.enTitle', null, array(
                    'header_class' => 'customActions',
                    'row_align' => 'left'
                ))
                ->add('path')
                ->add('alt', null, array(
                    'header_style' => 'width: 5%; text-align: center',
                    'row_align' => 'center'
                ))
        ;
    }

    /**
     * chap 2 - 4.2 started 
     * chap 7.5 advanced
     *  add filters to let user control which data will be displayed
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('type', null, array(
                    'show_filter' => true
                ))
                ->add('alt', null, array(
                    'operator_type' => 'hidden',
                    'advanced_filter' => false
                ))
                ->add('path')
                ->add('movie', null, array(), 'entity', array(
                    'class' => 'AppBundle\Entity\Movie',
                    'choice_label' => 'frTitle',
                ))
        ;
    }

    /**
     * 
     * chap 7.5 advanced
     * add default filters 
     */
    public function configureDefaultFilterValues(array &$filterValues) {
        /* $filterValues['type'] = array(
          'type' => ChoiceFilter::TYPE_CONTAINS,
          'value' => 'ici une valeur par defaut',
          );
         */
    }

    /**
     * chap 3.5 advanced
     * breadcrumb
     */
    public function toString($object) {
        return $object instanceof Gallery ? $object->getTitle() : 'Gallery';
    }

}
