<?php

declare(strict_types=1);

namespace Oc\Controller\Backend;

use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[AdminDashboard(routePath: '/backend', routeName: 'backend_dashboard')]
class DashboardController extends AbstractDashboardController
{
    #[IsGranted('ROLE_USER')]
    // TL:
        // Route hier noch einmal angeben, obwohl es oben im AdminDashboard-Comment aureichend sollte.
        // Reichte aber nicht, eswurde nie eine Route /admin gefunden.
        // daher hier gedoppelt, nun unter Route /admin/admin
    #[Route('/admin', name: 'admin_dashboard')] // Routenpfad ist /backend/admin, Routenname ist backend_admin_dashboard
    public function index(): Response
    {
        // TL:
        // ..#1 original
        //
        // Ergebnis beim Laden der Seite:
        // "Welcome to EasyAdmin 5" - Willkommensseite
//        return parent::index();

        // TL:
        // ..#2 mit render
        //
        // Ergebnis beim Laden der Seite:
        // Impossible to access an attribute ("i18n") on a null variable in @EasyAdmin/layout.html.twig at line 3.
        return $this->render('admin/adminbase.html.twig');

        // TL:
        // ..#2 mit Redirect statt render
        //
        // Ergebnis beim Laden der Seite:
        // EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator::setDashboard(): Argument #1 ($dashboardControllerFqcn) must be of type string,
        // null given, called in /var/www/html/htdocs_symfony/vendor/easycorp/easyadmin-bundle/src/Router/AdminUrlGenerator.php on line 174
//        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
//        return $this->redirect($adminUrlGenerator->setController(StatusController::class)->generateUrl());

        // TL:
        // ..#4 expilzites Erstellen der ea-Variablen, da das bislang nicht automatisch funktioniert
        // Google-KI: Normalerweise macht EA das selbst, aber falls nicht:
        //
        // Ergebnis beim Laden der Seite:
        // The given "Oc\Controller\Admin\DashboardController" class is not a valid Dashboard controller. Make sure it extends from
        // "EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController" or implements
        // "EasyCorp\Bundle\EasyAdminBundle\Contracts\Controller\DashboardControllerInterface".
//        return $this->render('admin/base.html.twig', [
//                'ea' => $this->container->get(AdminUrlGenerator::class)->setDashboard(self::class)->generateUrl(),
//        ]);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // return $this->redirectToRoute('admin_user_index');

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirectToRoute('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
                // the name visible to end users
                ->setTitle('Mein Admin')
                // you can include HTML contents too (e.g. to link to an image)
                // ->setTitle('<img src="..."> ACME <span class="text-small">Corp.</span>')

                // by default EasyAdmin displays a black square as its default favicon;
                // use this method to display a custom favicon: the given path is passed
                // "as is" to the Twig asset() function:
                // <link rel="shortcut icon" href="{{ asset('...') }}">
//                ->setFaviconPath('favicon.svg')

                // the domain used by default is 'messages'
//                ->setTranslationDomain('my-custom-domain')

                // there's no need to define the "text direction" explicitly because
                // its default value is inferred dynamically from the user locale
//                ->setTextDirection('ltr')

                // set this option if you prefer the page content to span the entire
                // browser width, instead of the default design which sets a max width
                ->renderContentMaximized()

                // set this option if you prefer the sidebar (which contains the main menu)
                // to be displayed as a narrow column instead of the default expanded design
                ->renderSidebarMinimized()

                // by default, users can select between a "light" and "dark" mode for the
                // backend interface. Call this method if you prefer to disable the "dark"
                // mode for any reason (e.g. if your interface customizations are not ready for it)
//                ->disableDarkMode()

                // by default, the UI color scheme is 'auto', which means that the backend
                // will use the same mode (light/dark) as the operating system and will
                // change in sync when the OS mode changes.
                // Use this option to set which mode ('light', 'dark' or 'auto') will users see
                // by default in the backend (users can change it via the color scheme selector)
//                ->setDefaultColorScheme('dark')
                // instead of magic strings, you can use constants as the value of
                // this option: EasyCorp\Bundle\EasyAdminBundle\Config\Option\ColorScheme::DARK

                // by default, all backend URLs are generated as absolute URLs. If you
                // need to generate relative URLs instead, call this method
                ->generateRelativeUrls()

                // set this option if you want to enable locale switching in dashboard.
                // IMPORTANT: this feature won't work unless you add the {_locale}
                // parameter in the admin dashboard URL (e.g. '/admin/{_locale}').
                // the name of each locale will be rendered in that locale
                // (in the following example you'll see: "English", "Polski")
//                ->setLocales(['en', 'pl'])
                // to customize the labels of locales, pass a key => value array
                // (e.g. to display flags; although it's not a recommended practice,
                // because many languages/locales are not associated to a single country)
//                ->setLocales([
//                        'en' => '🇬🇧 English',
//                        'pl' => '🇵🇱 Polski'
//                ])
                // to further customize the locale option, pass an instance of
                // EasyCorp\Bundle\EasyAdminBundle\Config\Locale
//                ->setLocales([
//                        'en', // locale without custom options
//                        Locale::new('pl', 'polski', 'far fa-language') // custom label and icon
//                ])
                ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('System');
        yield MenuItem::linkToRoute('System Status', 'fa fa-server', 'app_status_index');
        yield MenuItem::linkToLogout('Logout');
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
                ->addMenuItems([
                        MenuItem::linkToUrl('My Profile', 'fas fa-user', $this->generateUrl('app_profile_show')),
                        MenuItem::linkToLogout('Log Me Out of this...'),
                ])
                ;
    }
}
