<?php

namespace BusinessComponents\Discount\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use BusinessComponents\Product\Loader\JsonLoader as JsonProductLoader;
use BusinessComponents\Discount\Model\Discount;
use BusinessComponents\Discount\Model\QuantityBreak;
use BusinessComponents\Discount\Model\Rule;
use BusinessComponents\Discount\Discounter;

class ProductTestCommand extends Command
{
    protected function configure()
    {
        $this->ignoreValidationErrors();

        $this
            ->setName('discount:producttest')
            ->setDescription('Product test command')
            ->addArgument(
                'productfilename',
                InputArgument::REQUIRED,
                'Product filename'
            )
            ->addArgument(
                'discountfilename',
                InputArgument::REQUIRED,
                'Discount filename'
            )
        ;
    }

    private function dumpProduct($product)
    {
        echo "Results:\n";
        echo " - Code: " . $product->getCode() . "\n";
        echo " - Name: " . $product->getName() . "\n";
        echo " - State: " . $product->getState() . "\n";
        
        foreach ($product->getAttributes() as $attribute) {
            echo "   @" . $attribute->getKey() . '=' . $attribute->getValue() . "\n";
        }
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $productfilename = $input->getArgument('productfilename');
        // $discountfilename = $input->getArgument('discountfilename');
        
        $output->writeln('Loading product: ' . $productfilename);
        
        // $order = new \BusinessComponents\Order\Order();
        
        $l = new JsonProductLoader($productfilename);
        $product = $l->load();
        
        //$order->clearAdjustments();
        
        // -----------------------------
        
        $discount = new Discount();
        $discount->setName('2.50 off on green smoothies');
        $discount->setAction('LINE-FIXED');
        
        $rule = new Rule();
        $rule->setScope('line');
        $rule->setVariable('color');
        $rule->setComparison('equals');
        $rule->setValue('green');
        $discount->addRule($rule);

        $rule = new Rule();
        $rule->setScope('line');
        $rule->setVariable('category');
        $rule->setComparison('equals');
        $rule->setValue('smoothies');
        $discount->addRule($rule);

        $quantitybreak = new QuantityBreak();
        $quantitybreak->setQuantity(1);
        $quantitybreak->setActionParameter(2.50);
        $discount->addQuantityBreak($quantitybreak);

        $discounts = array($discount);
        
        $discounter = new Discounter();
        $this->dumpProduct($product);

        $matches = $discounter->getMatchedDiscountsForProduct($product, $discounts);
        $output->writeLn("Matched discounts: " . count($matches));
        foreach ($matches as $matcheddiscount) {
            $output->writeLn(" * " . $discount->getName());
        }


    }
}
