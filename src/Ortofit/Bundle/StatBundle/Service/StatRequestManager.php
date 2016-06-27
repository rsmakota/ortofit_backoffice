<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\StatBundle\Service;

use Ortofit\Bundle\StatBundle\Request\SimpleRequest;
use Ortofit\Bundle\StatBundle\Request\StatRequestInterface;
use Rsmakota\UtilityBundle\Service\DateRangeServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class StatRequestManager
 *
 * @package Ortofit\Bundle\StatBundle\Service
 */
class StatRequestManager implements StatRequestManagerInterface
{
    const PARAMETER_NAME_TO     = 'to';
    const PARAMETER_NAME_FROM   = 'from';
    const PARAMETER_NAME_PERIOD = 'periodType';
    
    /**
     * @var RequestStack
     */
    protected $requestStack;
    /**
     * @var DateRangeServiceInterface
     */
    protected $rangeManager;
    
    /**
     * StatRequestManager constructor.
     *
     * @param RequestStack              $requestStack
     * @param DateRangeServiceInterface $rangeManager
     */
    public function __construct(RequestStack $requestStack, DateRangeServiceInterface $rangeManager)
    {
        $this->requestStack = $requestStack;
        $this->rangeManager = $rangeManager;
    }
    
    /**
     * @return null|\Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest()
    {
        return $this->requestStack->getCurrentRequest();
    }

    /**
     * @param Request $request
     *
     * @return \Rsmakota\UtilityBundle\Date\DateRangeInterface
     */
    private function getRange($request)
    {
        $to   = $request->get(self::PARAMETER_NAME_TO);
        $from = $request->get(self::PARAMETER_NAME_FROM);
        
        return $this->rangeManager->createRange($from, $to);
    }
    
    /**
     * @return StatRequestInterface
     */
    public function create()
    {
        $request = $this->getRequest();
        $range   = $this->getRange($request);
        $type    = $request->get(self::PARAMETER_NAME_PERIOD);

        return new SimpleRequest($range, $type, $request->request);
    }
}