<?php

/**
 * Zaboy lib (http://zaboy.org/lib/)
 *
 * @copyright  Zaboychenko Andrey
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace zaboy\install;
use zaboy\rest\install\InstallerAbstract;
use zaboy\install\Ebay\Notification\Installer as NotificationInstaller;

/**
 * Installer class
 *
 * @category   Zaboy
 * @package    zaboy
 */
class Installer extends InstallerAbstract
{

    /**
     *
     * @var NotificationInstaller
     */
    protected $notificationInstaller;

    protected $dbAdapter;

    public function __construct($container)
    {
        parent::__construct($container);
        $this->dbAdapter = $this->container->get('db');
        $this->notificationInstaller = new NotificationInstaller($container);
    }

    public function install()
    {
        $this->notificationInstaller->install();
    }

    public function uninstall()
    {
        $this->notificationInstaller->uninstall();
    }

    public function rewrite()
    {
        $this->notificationInstaller->uninstall();
        $this->notificationInstaller->install();
    }

    public function addDataEavExampleStoreCatalog()
    {
        $this->rewrite();
    }

}
