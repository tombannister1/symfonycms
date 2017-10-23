<?php

namespace MadeByTom\NotificationBundle\Form;

use Doctrine\ORM\EntityRepository;
use MadeByTom\CoreBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
;

class CreateNotificationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', TextareaType::class, array(
                'attr'              => array('class' => 'form-control'),
                'required'          => true,
                'error_bubbling'    => true,
                'constraints'       => array(
                    new NotBlank(),
                    new Length(array('min' => 2)),
                ),
            ))
            ->add('recipient', EntityType::class, array(
                'class'             => 'MadeByTom\CoreBundle\Entity\User',
                'required'          => true,
                'error_bubbling'    => true,
                'attr'              => array('class' => 'form-control'),
                'query_builder'     => function (EntityRepository $er) use ( $options ) {
                    return $er->createQueryBuilder('u')
                        ->where('u.id != :id')
                        ->setParameter('id', $options['data']['id'])
                        ->orderBy('u.lastName','ASC');
                }
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => true,
            'filters' => array()
        ));
    }
}
