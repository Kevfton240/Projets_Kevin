<?php

namespace App\Controller\Admin;

use App\Entity\ItemTypes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ItemTypesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ItemTypes::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
