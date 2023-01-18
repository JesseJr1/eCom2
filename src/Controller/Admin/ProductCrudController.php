<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichImageField;
use App\Entity\Product;
use App\Entity\ProductPicture;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Info Génerales');
        yield Field::new('name');
        yield AssociationField::new('category');
        yield TextEditorField::new('description')->hideOnIndex();
        yield MoneyField::new('price')->setStoredAsCents(false)->setCurrency('EUR');
        
        yield FormField::addTab('Images');
        yield CollectionField::new('productPicture')
                ->setTemplatePath('admin/product/pictures.html.twig')
                ->setEntryType(ProductPicture::class);
    }
    
}
