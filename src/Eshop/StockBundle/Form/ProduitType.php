<?php

namespace Eshop\StockBundle\Form;

use blackknight467\StarRatingBundle\Form\RatingType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('file')
            ->add('prix')
            ->add('description')
            ->add('promotion')
            ->add('stock')
            ->add('categorie',EntityType::class, array(
                'class'=>'EshopStockBundle:Categorie',
                'choice_label'=>'libelle',
                'multiple'=>false,
                ))
            ->add('ajouter',SubmitType::class)
        ->add('rating', RatingType::class, [
        'stars' => 4
    ]);

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eshop\StockBundle\Entity\Produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'eshop_stockbundle_produit';
    }


}
