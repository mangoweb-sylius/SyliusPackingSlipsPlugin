<?php

declare(strict_types=1);

namespace MangoSylius\PackingSlipsPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class PackingSlipsMenuBuilder
{
	public function buildMenu(MenuBuilderEvent $event): void
	{
		$sales = $event
			->getMenu()
			->getChild('sales');

		if ($sales !== null) {
			$sales
				->addChild('packing_slips', [
					'route' => 'mango_sylius_admin_packing_slips_index',
				])
				->setName('Packing slips')
				->setLabelAttribute('icon', 'download');
		}
	}
}
