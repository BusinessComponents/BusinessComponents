<?php

namespace BusinessComponents\Invoice\Command;

use Symfony\Component\Console\Helper\DescriptorHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use BusinessComponents\Invoice\Model\InvoiceLine;
use BusinessComponents\Vat\Model\Vat;

class TestCommand extends Command
{
    protected function configure()
    {
        $this->ignoreValidationErrors();

        $this
            ->setName('invoice:test')
            ->setDescription('Test invoice')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $vat = new Vat();
        $vat->setValue(21);

        $line = new InvoiceLine();
        $line
            ->setVat($vat)
            ->setQuantity(3)
            ->setUnitPrice(200)
        ;
        $output->writeLn('Unit total: '. $line->getUnitPriceTotal());
        $output->writeLn('Total: '. $line->getTotalPrice());
    }
}
