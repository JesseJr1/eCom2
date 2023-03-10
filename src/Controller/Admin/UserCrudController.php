<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

//Champs sur la page edit sur le CRUD
    public function configureFields(string $pageName): iterable
    {
            yield EmailField::new('email');
            yield Field::new('plainPassword')->setHelp('Laissez vide pour conserver le MDP actuel');
            yield ChoiceField::new('roles')
            ->setChoices([
                'Administrateur' => 'ROLE_ADMIN',
                'Utilisateur' => 'ROLE_USER',
            ])
            ->allowMultipleChoices();
            yield Field::new('updatedAt')->onlyOnIndex();

    }
}
