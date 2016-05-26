<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
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
//        $client = new \Google_Client();
//        $client->setApplicationName("datadbstorage");
//        $client->setAuthConfigFile("/var/www/ORTOFIT/DataDBStorage-2eb1c3edff52.json");
//        $client->setAccessType('offline');
//
//        // Request authorization from the user.
//        $authUrl = $client->createAuthUrl();
//        printf("Open the following link in your browser:\n%s\n", $authUrl);
//        print 'Enter verification code: ';
//        $authCode = trim(fgets(STDIN));
//
//        // Exchange authorization code for an access token.
//        $accessToken = $client->authenticate($authCode);
//        $credentialsPath = __DIR__;
//        // Store the credentials to disk.
//        if(!file_exists(dirname($credentialsPath))) {
//            mkdir(dirname($credentialsPath), 0700, true);
//        }
//        file_put_contents($credentialsPath, $accessToken);
//        printf("Credentials saved to %s\n", $credentialsPath);
//
//        $service = new \Google_Service_Drive($client);


    }
}