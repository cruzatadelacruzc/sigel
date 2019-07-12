<?php

namespace AppBundle\Form;

use AppBundle\Entity\Convenio;
use AppBundle\Entity\Medico;
use AppBundle\Entity\OrdemServico;
use AppBundle\Entity\Paciente;
use AppBundle\Entity\PostoColecta;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrdemServicoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha', DateType::class, array(
                'widget' =>'single_text', 'html5' => false,
                'label' => 'app.form.data',
                'attr' => ['class' => 'form-control sigel-date']
            ))
            ->add('paciente', EntityType::class, [
                'label' => 'app.form.paciente',
                'class' => Paciente::class,
                'choice_label' => 'nome',
                'placeholder' => 'app.form.empty_value',
                'attr' => ['class' => 'custom-select d-block w-100l']
            ])
            ->add('medico', EntityType::class, [
                'label' => 'app.form.medico',
                'class' => Medico::class,
                'choice_label' => 'nome',
                'placeholder' => 'app.form.empty_value',
                'attr' => ['class' => 'custom-select d-block w-100']
            ])
            ->add('postoColecta', EntityType::class, [
                'label' => 'app.form.posto_colecta',
                'class' => PostoColecta::class,
                'placeholder' => 'app.form.empty_value',
                'choice_label' => 'descricao',
                'attr' => ['class' => 'custom-select d-block w-100'
                ]])
            ->add('convenio', EntityType::class, [
                'label' => 'app.form.convenio',
                'class' => Convenio::class,
                'choice_label' => 'descricao',
                'placeholder' => 'app.form.empty_value',
                'attr' => ['class' => 'custom-select d-block w-100']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OrdemServico::class
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_ordem_servico_type';
    }
}
