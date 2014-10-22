<?php

namespace BusinessComponents\Discount\Command;

use Symfony\Component\Console\Helper\DescriptorHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use BusinessComponents\Order\Loader\JsonLoader as JsonOrderLoader;

class TestCommand extends Command
{
    protected function configure()
    {
        $this->ignoreValidationErrors();

        $this
            ->setName('discount:test')
            ->setDescription('Test command')
            ->addArgument(
                'orderfilename',
                InputArgument::REQUIRED,
                'Order filename'
            )
            ->addArgument(
                'discountfilename',
                InputArgument::REQUIRED,
                'Discount filename'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $orderfilename = $input->getArgument('orderfilename');
        // $discountfilename = $input->getArgument('discountfilename');
        
        $output->writeln('Loading order: ' . $orderfilename);
        
        // $order = new \BusinessComponents\Order\Order();
        
        $l = new JsonOrderLoader($orderfilename);
        $order = $l->load();
        
        echo "Results:\n";
        echo " - Ref: " . $order->getRef() . "\n";
        echo " - State: " . $order->getState() . "\n";
        echo " - Totalprice: " . $order->getTotalPrice() . "\n";
        
        echo " - Lines:\n";
        foreach ($order->getLines() as $line) {
            echo "   - '" . $line->getTitle() . "' Quantity: " . $line->getQuantity() . " UnitPrice: " . $line->getUnitPrice() . ". Total: " . $line->getTotalPrice() . "\n";
        }
        
    }
}
