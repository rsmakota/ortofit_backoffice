<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeBundle\Command\Console;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\ClientDirection;
use Ortofit\Bundle\BackOfficeBundle\Entity\Group;
use Ortofit\Bundle\BackOfficeBundle\Entity\InsoleType;
use Ortofit\Bundle\BackOfficeBundle\Entity\Reason;
use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ModifyDataCommand extends ContainerAwareCommand
{

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    private function getManager()
    {
        return $this->getContainer()->get('doctrine.orm.entity_manager');
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
        $eManager = $this->getManager();

        $service = new ClientDirection();
        $service->setName('Направление врача');
        $service->setAlias('doctor');
        $service->setOrderNum(1);
        $eManager->persist($service);

        $friends = $eManager->getRepository(ClientDirection::class)->findOneBy(['alias'=>'friends']);
        $friends->setOrderNum(2);
        $eManager->merge($friends);

        $internet = $eManager->getRepository(ClientDirection::class)->findOneBy(['alias'=>'internet']);
        $internet->setOrderNum(3);
        $eManager->merge($internet);

        $oldBase = $eManager->getRepository(ClientDirection::class)->findOneBy(['alias'=>'old_base']);
        $oldBase->setOrderNum(4);
        $eManager->merge($oldBase);

        $bord = $eManager->getRepository(ClientDirection::class)->findOneBy(['alias'=>'bord']);
        $bord->setOrderNum(5);
        $eManager->merge($bord);

//        $unknown = $eManager->getRepository(ClientDirection::class)->findOneBy(['alias'=>'unknown']);
//        if (null != $unknown) {
//            $eManager->remove($unknown);
//        }

        $serviceKs = $eManager->getRepository(Service::class)->findOneBy(['alias'=>'consultation']);
        $serviceKs->setColor('#ff7514');
        $eManager->merge($serviceKs);

//        $serviceI = $eManager->getRepository(Service::class)->findOneBy(['alias'=>'insoles_correction']);
//        $serviceI->setColor('#ffa500');
//        $eManager->merge($serviceI);

        $serviceI = $eManager->getRepository(Service::class)->findOneBy(['alias'=>'insoles_correction']);
        $serviceI->setColor('#a6625b');
        $eManager->merge($serviceI);

        $serviceIm = $eManager->getRepository(Service::class)->findOneBy(['alias'=>'insoles_manufacturing']);
        $serviceIm->setColor('#bf7C26');
        $eManager->merge($serviceIm);

        $servicePc = $eManager->getRepository(Service::class)->findOneBy(['alias'=>'pc_diagnostic']);
        $servicePc->setColor('#d2722d');
        $eManager->merge($servicePc);

        $serviceF = $eManager->getRepository(Service::class)->findOneBy(['alias'=>'free_consultation']);
        $serviceF->setColor('#ecc384');
        $eManager->merge($serviceF);

        $serviceM = $eManager->getRepository(Service::class)->findOneBy(['alias'=>'massage']);
        $serviceM->setColor('#c93c20');
        $eManager->merge($serviceM);



        $serviceK = $eManager->getRepository(Service::class)->findOneBy(['alias'=>'kinesio_taping']);
        $serviceK->setShort('(КТ)');
        $serviceK->setColor('#8E402A');
        $eManager->merge($serviceK);


        $eManager->flush();
    }
}