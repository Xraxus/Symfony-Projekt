<?php
/**
 * User data type.
 */

namespace App\Form\Type;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UserPasswordType.
 */
class UserPasswordType extends AbstractType
{
    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the form.
     *
     * @see FormTypeExtensionInterface::buildForm()
     *
     * @param FormBuilderInterface $builder Form Builder
     * @param array                $options Form options
     *
     * @return void Void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'label.email',
                    'required' => true,
                 ]
            )
            ->add('newPassword', RepeatedType::class, [
                'mapped' => false,
                'type' => PasswordType::class,
                'invalid_message' => 'Hasła muszą się zgadzać',
                'options' => ['attr' => ['class' => 'form-control password-field']],
                'first_options' => ['label' => 'label_new_password'],
                'second_options' => ['label' => 'label_repeat_password'],
            ])
        ;
    }

    /**
     * Configures the options for this type.
     *
     * @param OptionsResolver $resolver Options resolver
     *
     * @return void Void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => User::class]);
    }

    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string Prefix of template block name
     */
    public function getBlockPrefix(): string
    {
        return 'user';
    }
}
