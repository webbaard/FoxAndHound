<?php

declare(strict_types=1);


namespace Webbaard\Pub\Infra\Tab\CommandHandler;


use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Webbaard\Pub\Infra\Tab\Command\RunProjection;
use Webbaard\Pub\Infra\Tab\Projection\Tab\TabProjectionManager;

final class RunProjectionHandler implements MessageHandlerInterface
{
    private TabProjectionManager $tapProjectionManager;

    public function __construct(TabProjectionManager $tapProjectionManager)
    {
        $this->tapProjectionManager = $tapProjectionManager;
    }

    public function __invoke(RunProjection $message)
    {
        $this->tapProjectionManager->get()->run(false);
    }
}