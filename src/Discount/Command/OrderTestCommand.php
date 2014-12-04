<?php

namespace BusinessComponents\Discount\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use BusinessComponents\Order\Loader\JsonLoader as JsonOrderLoader;
use BusinessComponents\Discount\Model\Discount;
use BusinessComponents\Discount\Model\QuantityBreak;
use BusinessComponents\Discount\Model\Rule;
use BusinessComponents\Discount\Discounter;

class OrderTestCommand extends Command
{
    protected function configure()
    {
        $this->ignoreValidationErrors();

        $this
            ->setName('discount:ordertest')
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

    private function dumpOrder($order)
    {
        echo "Results:\n";
        echo " - Ref: " . $order->getRef() . "\n";
        echo " - State: " . $order->getState() . "\n";
        echo " - Totalprice: " . $order->getTotalPrice() . "\n";
        
        foreach ($order->getAttributes() as $attribute) {
            echo "   @" . $attribute->getKey() . '=' . $attribute->getValue() . "\n";
        }
        echo "\n - Lines:\n";
        foreach ($order->getLines() as $line) {
            echo "   - '" . $line->getTitle() . "' Quantity: " . $line->getQuantity();
            echo " UnitPrice: " . $line->getUnitPrice() . ". Total: " . $line->getTotalPrice() . "\n";
            foreach ($line->getAttributes() as $attribute) {
                echo "     @" . $attribute->getKey() . '=' . $attribute->getValue() . "\n";
            }
            foreach ($line->getAdjustments() as $adjustment) {
                echo "     *" . $adjustment->getAction() . ' @ ' . $adjustment->getActionParameter() . " (" . $adjustment->getComment() . ")\n";
            }
            echo "\n";
        }
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $orderfilename = $input->getArgument('orderfilename');
        // $discountfilename = $input->getArgument('discountfilename');
        
        $output->writeln('Loading order: ' . $orderfilename);
        
        // $order = new \BusinessComponents\Order\Order();
        
        $l = new JsonOrderLoader($orderfilename);
        $order = $l->load();
        
        //$order->clearAdjustments();
        
    
        // -----------------------------
        
        $discount = new Discount();
        $discount->setName('10% off on 3 food items for orders from France');
        $discount->setAction('LINE-PERCENTAGE');
        
        $rule = new Rule();
        $rule->setScope('line');
        $rule->setVariable('category.food');
        $rule->setComparison('equals');
        $rule->setValue('true');
        $discount->addRule($rule);
        
        $rule = new Rule();
        $rule->setScope('line');
        $rule->setVariable('undefined');
        $rule->setComparison('not-equals');
        $rule->setValue('true');
        $discount->addRule($rule);


        $rule = new Rule();
        $rule->setScope('subject');
        $rule->setVariable('shipcountry');
        $rule->setComparison('equals');
        $rule->setValue('FRA');
        $discount->addRule($rule);


        $quantitybreak = new QuantityBreak();
        $quantitybreak->setQuantity(1);
        $quantitybreak->setActionParameter(0);
        $discount->addQuantityBreak($quantitybreak);

        $quantitybreak = new QuantityBreak();
        $quantitybreak->setQuantity(3);
        $quantitybreak->setActionParameter(10);
        $discount->addQuantityBreak($quantitybreak);
        
        $discounter = new Discounter();
        $discounter->generateAdjustments($order, $discount);

        // -----------------------------
        
        $discount = new Discount();
        $discount->setName('2.50 off on green products');
        $discount->setAction('LINE-FIXED');
        
        $rule = new Rule();
        $rule->setScope('line');
        $rule->setVariable('color');
        $rule->setComparison('equals');
        $rule->setValue('green');
        $discount->addRule($rule);
        
        $quantitybreak = new QuantityBreak();
        $quantitybreak->setQuantity(1);
        $quantitybreak->setActionParameter(2.50);
        $discount->addQuantityBreak($quantitybreak);

        $discounter = new Discounter();
        $discounter->generateAdjustments($order, $discount);
        
        
        // -----------------------------
        
        $this->dumpOrder($order);
    }
}
