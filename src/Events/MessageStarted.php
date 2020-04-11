<?php

namespace Kononovspb\Drivers\Viber\Events;


class MessageStarted extends ViberEvent
{
	/**
	 * Return the event name to match.
	 *
	 * @return string
	 */
	public function getName()
	{
		return 'conversation_started';
	}
}