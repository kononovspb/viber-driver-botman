<?php

namespace Kononovspb\Drivers\Viber\Events;


class Webhook extends ViberEvent
{

    /**
     * Return the event name to match.
     *
     * @return string
     */
    public function getName()
    {
        return 'webhook';
    }
}