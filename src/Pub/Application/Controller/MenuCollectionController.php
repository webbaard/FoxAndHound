<?php
declare(strict_types=1);

namespace Webbaard\Pub\Application\Controller;

use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Webbaard\Pub\Infra\Tab\Projection\Tab\TabFinder;

final class MenuCollectionController
{
    public function collectionAction(): Response
    {
        return new JsonResponse([
            'Whiskey',
            'Beer',
            'Gin',
            'Bourbon',
            'Wine',
            'Milk'
        ]);
    }
}
