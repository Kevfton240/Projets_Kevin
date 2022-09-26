<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use App\Entity\ItemTypes;
use App\Entity\User;
use App\Entity\Warehouse;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $url=$this->adminUrlGenerator->setController(ItemCrudController::class)
            ->generateUrl();
        return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Test');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud(label: "Warehouse",icon: "fa fa-home",entityFqcn: Warehouse::class);
        yield MenuItem::linkToCrud(label:"ItemTypes",icon: "fa fa-plus",entityFqcn: ItemTypes::class);
        yield MenuItem::linkToCrud(label: "User",icon: "fa fa-list",entityFqcn: User::class);
        yield MenuItem::linkToCrud(label: "Item",icon: "fa fa-list",entityFqcn: Item::class);
    }
}
