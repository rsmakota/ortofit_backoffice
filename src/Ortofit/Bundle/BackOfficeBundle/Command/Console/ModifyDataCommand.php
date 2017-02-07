<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeBundle\Command\Console;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\ClientDirection;
use Ortofit\Bundle\BackOfficeBundle\Entity\FamilyStatus;
use Ortofit\Bundle\BackOfficeBundle\Entity\Group;
use Ortofit\Bundle\BackOfficeBundle\Entity\InsoleType;
use Ortofit\Bundle\BackOfficeBundle\Entity\Reason;
use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\ParameterBag;


class ModifyDataCommand extends ContainerAwareCommand
{

    /**
     * @return object|\Ortofit\Bundle\BackOfficeBundle\EntityManager\FamilyStatusManager
     */
    private function getManager()
    {
        return $this->getContainer()->get('ortofit_back_office.client_family_status_manage');
    }



    /**
     */
    protected function configure()
    {
        $this
            ->setName('backoffice:modify:data')
            ->setDescription('This command modifies data for realise')
            ->setHelp(
                <<<EOT
                The <info>backoffice:modify:data</info> modifies data for realise.
EOT
            );
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getManager();
        $aliases = [
            'son' => 1,
            'daughter' => 2,
            'husband' => 3,
            'wife' => 4,
            'self' => 5,
            'mother' => 6,
            'father' => 7,
            'nephew' => 10,
            'niece' => 11,
        ];
        foreach ($aliases as $alias=>$position) {
            /** @var FamilyStatus $entity */
            $entity = $manager->findOneBy(['alias'=>$alias]);
            $entity->setPosition($position);
            $manager->merge($entity);
        }
        $params = ['name'=>'внук', 'alias'=>'grandson', 'general'=>true, 'position'=>8];
        $granddaughter = $manager->create(new ParameterBag($params));

        $params = ['name'=>'внучка', 'alias'=>'granddaughter', 'general'=>true, 'position'=>9];
        $granddaughter = $manager->create(new ParameterBag($params));

    }
}