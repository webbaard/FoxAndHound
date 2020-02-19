<?php

declare(strict_types=1);


namespace Webbaard\Pub\Application\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Webbaard\Pub\Domain\Tab\Repository\TabCollection;
use Webbaard\Pub\Domain\Tab\ValueObject\TabId;

final class TabController
{
    private TabCollection $tabCollection;

    public function __construct(TabCollection $tabCollection)
    {
        $this->tabCollection = $tabCollection;
    }

    public function detailsAction(string $id): JsonResponse
    {
        return JsonResponse::create(
            $this->tabCollection->get(TabId::fromString($id))->payload()
        );
    }
}