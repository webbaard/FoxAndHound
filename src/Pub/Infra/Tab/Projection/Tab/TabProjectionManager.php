<?php

namespace Webbaard\Pub\Infra\Tab\Projection\Tab;

use Doctrine\DBAL\DBALException;
use Prooph\EventStore\Projection\ProjectionManager as ProophProjectionManager;
use Prooph\EventStore\Projection\ReadModel;
use Prooph\EventStore\Projection\ReadModelProjector;
use Webbaard\BeerWarehouse\Infra\Beer\Projection\ProjectionManager;

class TabProjectionManager
{
    const TAB_PROJECTION = 'tab_projection';

    private ReadModelProjector $tabProjector;

    private TabReadModel $tabReadModel;

//    public function __construct(
//        ProophProjectionManager $projectionManager,
//        TabProjection $tabProjection,
//        TabReadModel $tabReadModel
//    ) {
//        $this->tabReadModel = $tabReadModel;
//        $this->tabProjector = $tabProjection->project(
//            $projectionManager->createReadModelProjection(self::TAB_PROJECTION, $tabReadModel)
//        );
//    }

    public function get(): ReadModelProjector
    {
        return $this->tabProjector;
    }

    public function exists(): bool
    {
        return $this->tabReadModel->isInitialized();
    }
}
