<?php


namespace App\CompilerPass;

use App\PricingContext\PricingContext;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class DiscountCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container): void
    {
        // Find the definition of our context service
        $contextDefinition = $container->findDefinition(PricingContext::class);

        // Find the definitions of all the strategy services
        $discountIds = array_keys(
            $container->findTaggedServiceIds('discounts')
        );

        // Call the addStrategy method on the context for each strategy
        foreach ($discountIds as $discountId) {
            $contextDefinition->addMethodCall(
                'addStrategy',
                [ $discountId, new Reference($discountId) ]
            );
        }
    }
}
