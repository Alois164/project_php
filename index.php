set_include_path(get_include_path() . PATH_SEPARATOR . '.;C:\php\pear');
require_once __DIR__.'/classes/Database.php';
(include_path='.;C:\php\pear;.;C:\php\pear')
require_once __DIR__.'/controllers/AuthController.php';
require_once __DIR__.'/controllers/DashboardController.php';

session_start();

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'authenticate':
        $controller = new AuthController();
        $controller->authenticate();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'dashboard':
        $controller = new DashboardController();
        $page = $_GET['page'] ?? 'stats';
        $controller->showPage($page);
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        exit('Page non trouvée');

        require_once('classes/Database.php');

}
?>
