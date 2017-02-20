<?php

namespace Eshop\StockBundle\Form;

use Eshop\StockBundle\Entity\Reclamation;
use Eshop\StockBundle\EshopStockBundle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('description')
            ->add('produit',EntityType::class, array(
                'class'=>'EshopStockBundle:Produit',
                'choice_label'=>'nom',
                'multiple'=>false,
            ))
                ->add('ajouter',SubmitType::class)
    ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\StockBundle\Entity\Reclamation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'eshop_stockbundle_reclamation';
    }


}
