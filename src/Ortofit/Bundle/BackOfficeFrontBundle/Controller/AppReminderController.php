<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

use Ortofit\Bundle\BackOfficeFrontBundle\Paginator\Paginator;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AppReminderController
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Controller
 */
class AppReminderController extends BaseController
{

    public function indexAction()
    {

        return $this->render('@OrtofitBackOfficeFront/Reminder/index.html.twig', []);
    }


    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\EntityManager\AppReminderManager
     */
    private function getRemindManager()
    {
        return $this->get('ortofit_back_office.app_reminder_manage');
    }

    private function getLimit()
    {
        return $this->getParameter('front_table_rows_limit');
    }

    /**
     * @param integer $current
     * @param string  $msisdn
     *
     * @return Paginator
     */
    private function getPaginator($current, $msisdn = null)
    {
        $limit = $this->getLimit();
        if (null == $msisdn) {
            $count = $this->getRemindManager()->count(["processed" => false]);
        } else {
            $count = $this->getRemindManager()->countLikeMsisdn($msisdn, ["processed" => false]);
        }

        return new Paginator($limit, $current, $count);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $msisdn    = $request->get('msisdn');
        $manager   = $this->getRemindManager();
        $limit     = $this->getLimit();
        $orderBy   = ['dateTime' => 'ASC'];
        $paginator = $this->getPaginator($request->get('page', 1), $msisdn);
        $offset    = $limit * ($paginator->current() - 1);
//dump($paginator); exit;
        if (null != $msisdn) {
            $reminds = $manager->findLikeMsisdn($msisdn, ['processed' => false], $orderBy, $limit, $offset);
        } else {
            $reminds = $manager->findBy(["processed"=>false], $orderBy, $limit, $offset);
        }
        $data = [
            'reminds'   => $reminds,
            'paginator' => $paginator,
            'msisdn'    => $msisdn,
            'page_route_name' => 'bf_remind_list'
        ];

        return $this->render('@OrtofitBackOfficeFront/Reminder/list.html.twig', $data);
    }

    public function editAction(Request $request)
    {
        $id = $request->get('id');
        $remind = $this->getRemindManager()->get($id);

        return $this->render('@OrtofitBackOfficeFront/Reminder/edit.html.twig', ["remind" => $remind]);

    }
}