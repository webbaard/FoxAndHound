<?php

declare(strict_types=1);


namespace Webbaard\Pub\Infra\Tab\Repository;


use Prooph\EventSourcing\Aggregate\AggregateRepository;
use Webbaard\Pub\Domain\Tab\Repository\TabCollection;
use Webbaard\Pub\Domain\Tab\Tab;
use Webbaard\Pub\Domain\Tab\ValueObject\TabId;

final class TabRepository extends AggregateRepository implements TabCollection
{

    public function get(TabId $tabId): Tab
    {
        return $this->getAggregateRoot($tabId->toString());
    }

    public function save(Tab $tab): void
    {
        $this->saveAggregateRoot($tab);
    }
}