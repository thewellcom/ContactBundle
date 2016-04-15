<?php

namespace TheWellCom\ContactBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

abstract class ContactAdmin extends Admin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('firstname')
            ->add('email')
            ->add('subject');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('firstname')
            ->add('phone')
            ->add('subject')
            ->add('email')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'delete' => array(),
                ),
            ));
    }

    protected function configureShowFields(ShowMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('firstname')
            ->add('phone')
            ->add('subject')
            ->add('email')
            ->add('message');
    }
}
