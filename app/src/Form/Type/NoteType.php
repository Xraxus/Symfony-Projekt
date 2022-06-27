<?php
/**
 * Note type.
 */

namespace App\Form\Type;

use App\Entity\Category;
use App\Entity\Note;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class NoteType.
 */
class NoteType extends AbstractType
{

    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the form.
     *
     * @see FormTypeExtensionInterface::buildForm()
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'NoteTitle',
                TextType::class,
                [
                'label' => 'label.title',
                'required' => true,
                'attr' => ['max_length' => 64],
                ]
            )
            ->add(
                'NoteContent',
                TextType::class,
                [
                'label' => 'label.content',
                'required' => true,
                'attr' => ['max_length' => 255],
                ]
            )
            ->add(
                'Category',
                EntityType::class,
                [
                    'class' => Category::class,
                    'choice_label' => 'categoryName',
                    'label' => 'label.category',
                    'required' => true,
                ]
            );
    }


    /**
     * Configures the options for this type.
     *
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Note::class]);
    }


    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'note';
    }
}
