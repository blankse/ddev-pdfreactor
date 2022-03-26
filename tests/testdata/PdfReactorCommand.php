<?php

namespace App\Command;

use Pimcore\Console\AbstractCommand;
use Pimcore\Web2Print\Processor;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PdfReactorCommand extends AbstractCommand
{
    protected function configure(): void
    {
        $this->setName('app:pdf-reactor');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     *
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if (Processor::getInstance()->preparePdfGeneration(75, ['disableBackgroundExecution' => true])) {
            $output->writeln('<info>Pimcore can generate a PDF</info>');
            return 0;
        }

        $output->writeln('<error>Pimcore can not generate a PDF</error>')
        return 1;
    }
}
