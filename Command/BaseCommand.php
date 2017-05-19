<?php

/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    17/05/17
 * Time:    20:52
 * Project: speedweaver
 * File:    BaseCommand.php
 *
 **/

namespace PartFire\CommonBundle\Command;

use PartFire\CommonBundle\Services\Output\Cli\ConsoleOutput;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class BaseCommand extends ContainerAwareCommand
{
    protected function getConsoleOutPutter() : ConsoleOutput
    {
        return $this->getContainer()->get('partfire_common.output_console');
    }

    protected function configure()
    {
        $this
            ->setName('pf:base:command')
            ->setDescription('Dummy base command')
            ->addOption('yell', null,   InputOption::VALUE_NONE,    'If set, the task will yell in uppercase letters');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $this->getConsoleOutPutter();
        $this->output->setOutputer($output);

        $this->output->info("PartFire dummy command that doesn't do anything except used to extend...");
    }
}