<?php


namespace App\Command;

use App\Exceptions\CartNotFoundException;
use App\PricingContext\PricingContext;
use App\Repository\CartItemRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InvoiceGenerationCommand extends Command
{

    protected static $defaultName = 'app:create-invoice';
    private CartItemRepository $repository;
    private PricingContext $pricingContext;

    public function __construct(CartItemRepository $repository, PricingContext $pricingContext)
    {
        $this->repository = $repository;
        $this->pricingContext = $pricingContext;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('customerId', InputArgument::REQUIRED, 'Customer ID');
        $this->addArgument('coupon', InputArgument::OPTIONAL, 'Coupon code (optional)')
        ;
    }

    /**
     * @throws CartNotFoundException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int|array
    {
        $customerId =$input->getArgument('customerId');
        $coupon =$input->getArgument('coupon');

        $output->writeln($customerId);

        $total = $this->pricingContext->calculateTotal($customerId, $coupon, $this->repository);

        dump($total);
        return 0;
    }
}
