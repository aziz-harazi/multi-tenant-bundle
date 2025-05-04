<?php

declare(strict_types=1);

namespace AzizHikari\MultiTenantBundle\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ResponseSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [

            KernelEvents::RESPONSE => [ 'addHeaders', 0]
        ];
    }

    public function addHeaders(ResponseEvent $event)
    {
        $response = $event->getResponse();
        $response->headers->set('X-Header', 'My custom header2');
    }
}