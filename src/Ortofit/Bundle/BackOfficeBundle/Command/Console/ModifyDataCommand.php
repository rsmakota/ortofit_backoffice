<?php
/**
 * @author    Rodion Smakota <rsmakota@nebupay.com>
 * @copyright 2015 Nebupay LLC
 */

namespace Ortofit\Bundle\BackOfficeBundle\Command\Console;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\ClientDirection;
use Ortofit\Bundle\BackOfficeBundle\Entity\Group;
use Ortofit\Bundle\BackOfficeBundle\Entity\Reason;
use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ModifyDataCommand extends ContainerAwareCommand
{

    private $data = [
        "Заболели"            => "sick",
        "Не берут трубку"     => "not_available",
        "Передумали"          => "not_available",
        "Пошли к конкурентам" => "competitors",
        "Другое"              => "other"
    ];
    /**
     * @return \Doctrine\ORM\EntityManager
     */
    private function getManager()
    {
        return $this->getContainer()->get('doctrine.orm.entity_manager');
    }

    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\EntityManager\OfficeManager
     */
    private function getOfficeManager()
    {
        return $this->getContainer()->get('ortofit_back_office.office_manage');
    }

    /**
     * @see Console\Command\Command
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
     * @see Console\Command\Command
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        foreach ($this->data as $name=>$reason) {
            $closeReason = new Reason();
            $closeReason->setName($name);
            $closeReason->setAlias($reason);
            $closeReason->setType(Reason::TYPE_CLOSE);

            $this->getManager()->persist($closeReason);
        }

        $this->getManager()->flush();
    }
}