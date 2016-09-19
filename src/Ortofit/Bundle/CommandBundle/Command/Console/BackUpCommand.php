<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\CommandBundle\Command\Console;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class BackUpCommand
 *
 * @package Ortofit\Bundle\CommandBundle\Command\Console
 */
class BackUpCommand extends ContainerAwareCommand
{
    /**
     * @see Console\Command\Command
     */
    protected function configure()
    {
        $this
            ->setName('ortofit:backup:command')
            ->setDescription('This command make backup')
            ->setHelp(
                <<<EOT
                The <info>ortofit:backup:command</info> make backup.
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

    }
}