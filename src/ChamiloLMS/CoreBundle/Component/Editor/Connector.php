<?php
/* For licensing terms, see /license.txt */

namespace ChamiloLMS\CoreBundle\Component\Editor;

use Doctrine\ORM\EntityManager;
use Application\Sonata\UserBundle\Entity\User;
use ChamiloLMS\CoreBundle\Entity\Course;

use Symfony\Component\Translation\Translator;
use Symfony\Component\Routing\Router;
use ChamiloLMS\CoreBundle\Component\Editor\Driver\Driver;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Class elFinder Connector - editor + Chamilo repository
 * @package ChamiloLMS\CoreBundle\Component\Editor
 */
class Connector
{
    /** @var Course */
    public $course;

    /** @var User */
    public $user;

    /** @var Translator */
    public $translator;

    /** @var Router */
    public $urlGenerator;
    /** @var SecurityContext */
    public $security;

    public $paths;

    public $entityManager;

    public $drivers = array();
    public $driverList = array();

    public function __construct(
        EntityManager $entityManager,
        array $paths,
        Router $urlGenerator,
        Translator $translator,
        SecurityContext $security,
        $user,
        $course = null
    ) {
        $this->entityManager = $entityManager;
        $this->paths = $paths;
        $this->urlGenerator = $urlGenerator;
        $this->translator = $translator;
        $this->security = $security;
        $this->user = $user;
        $this->course = $course;
        $this->driverList = $this->getDefaultDriverList();
    }

    /**
     * @return array
     */
    public function getDriverList()
    {
        return $this->driverList;
    }

    /**
     * Available driver list.
     * @param array
     */
    public function setDriverList($list)
    {
        $this->driverList = $list;
    }

    /**
     * Available driver list.
     * @return array
     */
    private function getDefaultDriverList()
    {
        return array(
            'CourseDriver',
            'CourseUserDriver',
            'DropBoxDriver',
            'HomeDriver',
            'PersonalDriver'
        );
    }

    /**
     * @param Driver $driver
     */
    public function addDriver($driver)
    {
        if (!empty($driver)) {
            $this->drivers[$driver->getName()] = $driver;
        }
    }

    /**
     * @return array
     */
    public function getDrivers()
    {
        return $this->drivers;
    }

    /**
     * @param string $driverName
     * @return Driver $driver
     */
    public function getDriver($driverName)
    {
        if (isset($this->drivers[$driverName])) {
            return $this->drivers[$driverName];
        }
        return null;
    }

    /**
     * @param bool $processDefaultValues
     * @return array
     */
    public function getRoots($processDefaultValues = true)
    {
        $roots = array();
        /** @var Driver $driver */
        $drivers = $this->getDrivers();

        foreach ($drivers as $driver) {
            if ($processDefaultValues) {
                $plugin = array(
                    'chamilo' => array(
                        'driverName' => $driver->getName(),
                        'connector' => $this,
                    )
                );
                $configuration = $driver->getConfiguration();
                $configuration['plugin'] = $plugin;
                $root = $this->updateWithDefaultValues($configuration);
            }
            $roots[] = $root;
        }
        return $roots;
    }

    /**
     * Merges the default driver settings.
     * @param array $driver
     * @return array
     */
    public function updateWithDefaultValues($driver)
    {
        if (empty($driver) || !isset($driver['driver'])) {
            return array();
        }

        $defaultDriver = $this->getDefaultDriverSettings();

        if (isset($driver['attributes'])) {
            $attributes = array_merge($defaultDriver['attributes'], $driver['attributes']);
        } else {
            $attributes = $defaultDriver['attributes'];
        }

        $driverUpdated = array_merge($defaultDriver, $driver);

        $driverUpdated['driver'] = 'ChamiloLMS\CoreBundle\Component\Editor\Driver\\'.$driver['driver'];
        $driverUpdated['attributes'] = $attributes;
        return $driverUpdated;
    }

    /**
     * Get default driver settings.
     * @return array
     */
    private function getDefaultDriverSettings()
    {
        // for more options: https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options
        return array(
            'uploadOverwrite' => false, // Replace files on upload or give them new name if the same file was uploaded
            //'acceptedName' =>
            'uploadAllow' => array(
                'image',
                'audio',
                'video',
                'text/html',
                'text/csv',
                'application/pdf',
                'application/postscript',
                'application/vnd.ms-word',
                'application/vnd.ms-excel',
                'application/vnd.ms-powerpoint',
                'application/pdf',
                'application/xml',
                'application/vnd.oasis.opendocument.text',
                'application/x-shockwave-flash'
            ), # allow files
            //'uploadDeny' => array('text/x-php'),
            'uploadOrder' => array('allow'), // only executes allow
            'disabled' => array(
                'duplicate',
                'rename',
                'mkdir',
                'mkfile',
                'copy',
                'cut',
                'paste',
                'edit',
                'extract',
                'archive',
                'help',
                'resize'
            ),
            'attributes' =>  array(
                // Hiding dangerous files
                array(
                    'pattern' => '/\.(php|py|pl|sh|xml)$/i',
                    'read' => false,
                    'write' => false,
                    'hidden' => true,
                    'locked' => false
                ),
                // Hiding _DELETED_ files
                array(
                    'pattern' => '/_DELETED_/',
                    'read' => false,
                    'write' => false,
                    'hidden' => true,
                    'locked' => false
                ),
                // Hiding thumbnails
                array(
                    'pattern' => '/.tmb/',
                    'read' => false,
                    'write' => false,
                    'hidden' => true,
                    'locked' => false
                ),
                array(
                    'pattern' => '/.thumbs/',
                    'read' => false,
                    'write' => false,
                    'hidden' => true,
                    'locked' => false
                ),
                array(
                    'pattern' => '/.quarantine/',
                    'read' => false,
                    'write' => false,
                    'hidden' => true,
                    'locked' => false
                )
            )
        );
    }

    /**
     * @return array
     */
    public function getOperations()
    {
        //https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1
        $opts = array(
            //'debug' => true,
            'bind' => array(
                'upload rm' => array($this, 'manageCommands')
            )
        );

        $this->setDrivers();

        $opts['roots'] = $this->getRoots();
        return $opts;
    }

    /**
     * Set drivers from list
     */
    public function setDrivers()
    {
        foreach ($this->getDriverList() as $driverName) {
            $this->setDriver($driverName);
        }
    }

    /**
     * Sets a driver.
     * @param string $driverName
     */
    public function setDriver($driverName)
    {
        $driverClass = $this->getDriverClass($driverName);
        /** @var Driver $driver */
        $driver = new $driverClass();
        $driver->setName($driverName);
        $driver->setConnector($this);
        $this->addDriver($driver);
    }

    /**
     * Simple function to demonstrate how to control file access using "accessControl" callback.
     * This method will disable accessing files/folders starting from  '.' (dot)
     *
     * @param string $attr  attribute name (read|write|locked|hidden)
     * @param string $path  file path relative to volume root directory started with directory separator
     * @param string $data
     * @param string $volume
     * @return bool|null
     **/
    public function access($attr, $path, $data, $volume)
    {
    	return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
    		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
    		:  null;                                    // else elFinder decide it itself
    }

    /**
     * @param string $cmd
     * @param array $result
     * @param array $args
     * @param Finder $elFinder
     */
    public function manageCommands($cmd, $result, $args, $elFinder)
    {
        $cmd = ucfirst($cmd);
        $cmd = 'after'.$cmd;
/*
        if (isset($args['target'])) {
            $driverName = $elFinder->getVolumeDriverNameByTarget($args['target']);
        }

        if (isset($args['targets'])) {
            foreach ($args['targets'] as $target) {
                $driverName = $elFinder->getVolumeDriverNameByTarget($target);
                break;
            }
        }
*/
        if (empty($driverName)) {
            return false;
        }

        if (!empty($result['error'])) {
        }

        if (!empty($result['warning'])) {
        }

        if (!empty($result['removed'])) {
            foreach ($result['removed'] as $file) {
                /** @var Driver $driver */
//                $driver = $this->getDriver($driverName);
//                $driver->$cmd($file, $args, $elFinder);
                // removed file contain additional field "realpath"
                //$log .= "\tREMOVED: ".$file['realpath']."\n";
            }
        }

        if (!empty($result['added'])) {
            foreach ($result['added'] as $file) {
//                $driver = $this->getDriver($driverName);
//                $driver->$cmd($file, $args, $elFinder);
            }
        }

        if (!empty($result['changed'])) {
            foreach ($result['changed'] as $file) {
                //$log .= "\tCHANGED: ".$elfinder->realpath($file['hash'])."\n";
            }
        }
    }

    /**
     * @param string $driver
     * @return string
     */
    private function getDriverClass($driver)
    {
        return 'ChamiloLMS\CoreBundle\Component\Editor\Driver\\'.$driver;
    }
}
