<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichImageField;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield Field::new('name');
        yield VichImageField::new('imageFile');
    
    }
    
}
