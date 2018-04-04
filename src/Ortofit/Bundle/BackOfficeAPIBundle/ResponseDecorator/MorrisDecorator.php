<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\ResponseDecorator;

use Ortofit\Bundle\BackOfficeBundle\Entity\Office;

/**
 * Class MorrisDecorator
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\ChartDecorator
 */
class MorrisDecorator implements ResponseDecoratorInterface
{
    private $periodFormat = 'Y-m';

    private $xKey;
    private $yKeys;
    private $data;
    private $yName;
    private $items=[];
    /**
     * @param array $data
     *
     * @return void
     */
    private function format($data)
    {
        $this->xKey = 'period';
        for($i = 0; $i<count($data); $i++) {
            $this->formatLine($data[$i], $i);
            $this->yKeys[] = $i;
            $this->addYName($data[$i], $i);
        }
        $this->formatItems();
    }

    private function formatItems()
    {
        foreach ($this->items as $key=>$item) {
            $this->data[] = array_merge(['period'=>$key], $item);    
        }
    }

    public function createItem($item, $index)
    {
        if(!key_exists('date', $item) || !($item['date'] instanceof \DateTime)) {
            throw new \Exception('Wrong format. The field "date" doesn\'t exist in a item.');
        }
        if (!key_exists('value', $item)) {
            throw new \Exception('Wrong format. The field "value" doesn\'t exist in a item.');
        }
        /** @var \DateTime $date */
        $date = $item['date'];
        $key = $date->format($this->periodFormat);
        if (!key_exists($key, $this->items)) {
            $this->items[$key] = [];
        }
        $this->items[$key][$index] = $item['value'];
    }

    private function formatLine($line, $index)
    {
        if (!key_exists('data', $line)) {
            throw new \Exception('Wrong format. The field "data" doesn\'t exist.');
        }

        foreach ($line['data'] as $item) {
            $this->createItem($item, $index);
        }

    }

    private function addYName($line, $index)
    {
        $name = $index;
        if ($line['line_name']) {
            $name = $line['line_name'];
        }
        $this->yName[$index] = $name;
    }

    private function clear() {
        $this->xKey  = null;
        $this->yKeys = [];
        $this->data  = [];
        $this->yName = [];
        $this->items = [];
    }
    /**
     * @param array $data
     *
     * @return array
     */
    public function decorate(array $data)
    {
        $this->clear();
        $this->format($data);

        return ['xKey' => $this->xKey, 'yKeys'=>$this->yKeys, 'yName'=> $this->yName, 'data' => $this->data ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'morris';
    }
}