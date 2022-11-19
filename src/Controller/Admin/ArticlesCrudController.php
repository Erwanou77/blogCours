<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticlesCrudController extends AbstractCrudController
{
    public const ARTICLES_BASE_PATH = 'upload/images/articles';
    public const ARTICLES_UPLOAD_DIR = 'public/upload/images/articles';
    public static function getEntityFqcn(): string
    {
        return Articles::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('description'),
            TextEditorField::new('content'),
            AssociationField::new('user'),
            ImageField::new('pathImg')
                ->setBasePath(self::ARTICLES_BASE_PATH)
                ->setUploadDir(self::ARTICLES_UPLOAD_DIR),
            BooleanField::new('isStatus'),
            DateTimeField::new('createdAt')->hideOnForm()
        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Articles) return;

        $entityInstance->setCreatedAt(new \DateTimeImmutable());

        parent::persistEntity($em, $entityInstance);
    }
}
