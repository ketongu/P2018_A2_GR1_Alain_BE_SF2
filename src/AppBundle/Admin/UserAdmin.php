<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use AppBundle\Entity\User;

class UserAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {


        $isNew = null === $this->getSubject()->getId() ? true : false;


        $formMapper
            ->add('lastName')
            ->add('name')
            ->add('image')
            ->add('birthday', 'birthday', [
                'years'=>range(date('Y')-90,date('Y')),
            ])
            ->add('gender', 'choice', [
                'choices'=>[
                    \AppBundle\Entity\User::GENDER_MALE =>'male',
                    \AppBundle\Entity\User::GENDER_FEMALE =>'female',
                ],
                'data' => true === $isNew ? User::GENDER_FEMALE : $this->getSubject()->getGender(),
            ])
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('lastName')
            ->add('name')
            ->add('image')
            ->add('gender',null, [], 'choice', [
                'choices'=>[
                    \AppBundle\Entity\User::GENDER_MALE =>'male',
                    \AppBundle\Entity\User::GENDER_FEMALE =>'female',
                ]
            ])
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('lastName')
            ->add('name')
            ->add('image')
            ->add('gender', 'choice', [
                'choices'=>[
                    \AppBundle\Entity\User::GENDER_MALE =>'male',
                    \AppBundle\Entity\User::GENDER_FEMALE =>'female',
                ]
            ])
            ->add('_action', 'actions', [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => []
                ]
            ])
            ->add('review')
        ;
    }
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('name')
            ->add('image')
            ->add('lastname')
            ->add('birthday')
            ->add('gender')
        ;
    }
}