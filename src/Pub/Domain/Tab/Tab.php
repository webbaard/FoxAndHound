<?php

declare(strict_types=1);


namespace Webbaard\Pub\Domain\Tab;


use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;
use Webbaard\Pub\Domain\Tab\Event\TabWasOpened;
use Webbaard\Pub\Domain\Tab\ValueObject\CustomerName;
use Webbaard\Pub\Domain\Tab\ValueObject\OpenedOn;
use Webbaard\Pub\Domain\Tab\ValueObject\TabId;

final class Tab extends AggregateRoot
{
    private TabId $tabId;

    private CustomerName $customerName;

    private OpenedOn $openedOn;

    public static function forCustomer(CustomerName $customerName): self
    {
        $self = new self();
        $self->customerName = $customerName;
        $self->tabId = TabId::new();
        $self->recordThat(
            TabWasOpened::forCustomer(
                $self->tabId,
                $customerName
            )
        );
        return $self;
    }

    protected function aggregateId(): string
    {
        return $this->tabId->toString();
    }

    public function whenTabWasOpened(TabWasOpened $event): void
    {
        $this->tabId = $event->tabId();
        $this->customerName = $event->customerName();
        $this->openedOn = $event->openedOn();
    }

    protected function apply(AggregateChanged $event): void
    {
        switch(true) {
            case $event instanceof TabWasOpened:
                $this->whenTabWasOpened($event);
                break;
        }
    }

    public function payload(){
       return [
           'id' => $this->tabId->toString(),
           'customerName' => $this->customerName->toString(),
           'openedOn' => $this->openedOn->toString()
       ];
    }
}