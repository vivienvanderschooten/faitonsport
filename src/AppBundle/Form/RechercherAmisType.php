<?php
/**
 * Created by PhpStorm.
 * User: vivienvanderschooten
 * Date: 10/11/2016
 * Time: 14:41
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercherAmisType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction('resultatRecherche');
        $builder->add('recherche', null, array('mapped' => 'false'));
    }


}