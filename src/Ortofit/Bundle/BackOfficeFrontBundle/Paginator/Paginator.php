<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Paginator;

/**
 * Class Paginator
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Paginator
 */
class Paginator implements PaginatorInterface
{
    /**
     * @var integer Max pages
     */
    private $limit;

    /**
     * @var integer Number of pages
     */
    private $count;

    /**
     * @var integer  Current page
     */
    private $current;
    /**
     * @var integer Start page
     */
    private $start;
    /**
     * @var integer End page
     */
    private $end;
    /**
     * Paginator constructor.
     * @param integer $limit
     * @param integer $current
     * @param integer $count
     */
    public function __construct($limit, $current, $count)
    {
        $this->limit  = $limit;
        $this->count  = ceil($count/$limit);
        if ($this->count >= $current) {
            $this->current = $current;
        } else {
            $this->current = $this->count;
        }
        $this->start = $this->current - floor($this->limit/2);
        if ($this->start < 1) {
            $this->start = 1;
        }

        $this->end = ($this->start + $this->limit) - 1;
        if ($this->end > $this->count) {
            $this->end = $this->count;
        }
    }

    /**
     * Count of pages
     * @return mixed
     */
    public function count()
    {
        return $this->count;
    }

    /**
     * Get current page
     * @return integer
     */
    public function current()
    {
        return $this->current;
    }

    /**
     * Get next page
     * @return integer|null
     */
    public function next()
    {
        $next = $this->current() + 1;
        if ($this->count >= $next) {
            return $next;
        }

        return null;
    }

    /**
     * Get previous page
     * @return integer|null
     */
    public function previous()
    {
        $previous = $this->current() - 1;
        if (0 < $previous) {
            return $previous;
        }

        return null;
    }

    public function start() 
    {
        return $this->start;
    }

    public function end()
    {

        return $this->end;
    }
}