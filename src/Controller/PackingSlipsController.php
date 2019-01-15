<?php

declare(strict_types=1);

namespace MangoSylius\PackingSlipsPlugin\Controller;

use Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\ShipmentInterface;
use Sylius\Component\Core\Repository\ShipmentRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

class PackingSlipsController
{
	/** @var EngineInterface */
	private $templatingEngine;

	/** @var ShipmentRepositoryInterface */
	private $shipmentRepository;

	public function __construct(
		EngineInterface $templatingEngine,
		ShipmentRepositoryInterface $shipmentRepository
	) {
		$this->templatingEngine = $templatingEngine;
		$this->shipmentRepository = $shipmentRepository;
	}

	public function index(): Response
	{
		$shipments = $this->getReadyShipments();

		return new Response(
			$this->templatingEngine->render(
				'@MangoSyliusPackingSlipsPlugin/index.html.twig',
				[
					'shipments' => $shipments,
				]
			)
		);
	}

	public function show(Request $request): Response
	{
		$ids = $request->get('ids', []);
		$shipments = $this->getShipmentsByIds($ids);

		return new Response(
			$this->templatingEngine->render(
				'@MangoSyliusPackingSlipsPlugin/show.html.twig',
				[
					'shipments' => $shipments,
				]
			)
		);
	}

	public function getShipmentsByIds(array $ids): array
	{
		/** @var EntityRepository $shipmentRepository */
		$shipmentRepository = $this->shipmentRepository;

		return $shipmentRepository->createQueryBuilder('s')
			->select('s')
			->join('s.order', 'o')
			->andWhere('s.id in (:ids)')
			->setParameter('ids', $ids)
			->orderBy('o.number', 'ASC')
			->getQuery()
			->getResult();
	}

	public function getReadyShipments(): array
	{
		/** @var EntityRepository $shipmentRepository */
		$shipmentRepository = $this->shipmentRepository;

		return $shipmentRepository->createQueryBuilder('s')
			->select('s')
			->join('s.method', 'm')
			->join('s.order', 'o')
			->where('s.state = :state')
			->setParameter('state', ShipmentInterface::STATE_READY)
			->orderBy('o.number', 'ASC')
			->getQuery()
			->getResult();
	}
}
