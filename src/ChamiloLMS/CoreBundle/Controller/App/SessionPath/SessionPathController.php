<?php
/* For licensing terms, see /license.txt */

namespace ChamiloLMS\CoreBundle\Controller\App\SessionPath;

use Silex\Application;
use ChamiloLMS\CoreBundle\Controller\CrudController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use ChamiloLMS\CoreBundle\Entity\SessionPath;
use ChamiloLMS\CoreBundle\Form\SessionPathType;

/**
 * @package ChamiloLMS.Controller
 * @author Julio Montoya <gugli100@gmail.com>
 */
class SessionPathController
{
    public function getClass()
    {
        return 'ChamiloLMS\CoreBundle\Entity\SessionPath';
    }

    public function getControllerAlias()
    {
        return 'session_path.controller';
    }

    /**
     * {@inheritdoc}
     */
    public function getTemplatePath()
    {
        return 'app/session_path/';
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'ChamiloLMS\CoreBundle\Form\SessionPathType';
    }

    /**
     *
     * @Route("/{id}", requirements={"id" = "\d+"})
     * @Method({"GET"})
     */
    public function readAction($id)
    {
        $options = array(
            'decorate' => true,
            'rootOpen' => '<ul>',
            'rootClose' => '</ul>',
            'childOpen' => '<li>',
            'childClose' => '</li>',
            'nodeDecorator' => function($row) {
                    /*$addChildren = '<a class="btn" href="'.$this->createUrl('add_from_parent_link', array('id' => $row['id'])).'">Add children</a>';
                    $readLink = '<a href="'.$this->createUrl('read_link', array('id' => $row['id'])).'">'.$row['branchName'].'</a>';
                    $editLink = '<a class="btn" href="'.$this->createUrl('update_link', array('id' => $row['id'])).'">Edit</a>';
                    $addDirector = '<a class="btn" href="'.$this->generateUrl('branch.controller:addDirectorAction', array('id' => $row['id'])).'">Add director</a>';
                    $deleteLink = '<a class="btn" href="'.$this->createUrl('delete_link', array('id' => $row['id'])).'"/>Delete</a>';
                    return $readLink.' '.$addChildren.' '.$addDirector.' '.$editLink.' '.$deleteLink;*/
                }
            //'representationField' => 'slug',
            //'html' => true
        );

        // @todo put this in a function
        $repo = $this->get('orm.em')->getRepository('ChamiloLMS\CoreBundle\Entity\SessionTree');

        $query = $this->getManager()
            ->createQueryBuilder()
            ->select('node')
            ->from('ChamiloLMS\CoreBundle\Entity\SessionTree', 'node')
            //->where('node.cId = 0')
            ->orderBy('node.root, node.lft', 'ASC')
            ->getQuery();

        $htmlTree = $repo->buildTree($query->getArrayResult(), $options);

        $item = $this->getEntity($id);
        $this->get('template')->assign('item', $item);
        $this->get('template')->assign('tree', $htmlTree);
        $this->get('template')->assign('links', $this->generateLinks());
        $response = $this->get('template')->render_template($this->getTemplatePath().'read.tpl');
        return new Response($response, 200, array());

        $this->readEntity($id);
    }
}
