<?php

namespace TheArdent\Drivers\Viber\Extensions;

use JsonSerializable;

class KeyboardTemplate implements JsonSerializable
{
	private $type = 'text';

	/**
	 * @var string
	 */
	protected $text;

	/**
	 * @var array
	 */
	protected $buttons;

	protected $defaultHeight;

	/**
	 * PictureTemplate constructor.
	 *
	 * @param string $imageUrl
	 * @param string $text
	 */
	public function __construct($text, $defaultHeight = false)
	{
		$this->text = $text;
		$this->defaultHeight = $defaultHeight;
	}

	/**
	 * @return array
	 */
	public function jsonSerialize()
	{
		return [
		    'min_api_version' => 3,
			'type'     => $this->type,
			'text'     => $this->text,
			'keyboard' => [
				'Type'          => 'keyboard',
				'DefaultHeight' => $this->defaultHeight,
				'Buttons'       => $this->buttons
			]
		];
	}

	/**
	 * @param        $text
	 * @param string $actionType Supported: reply, open-url, location-picker, share-phone, none
	 * @param string $actionBody
	 * @param string $textSize
	 */
	public function addButton($text, $actionType = 'reply', $actionBody = 'reply to me', $textSize = 'regular', $color = null, $width = 6, $silent = false)
	{
		$btn = [
			"Columns"    => $width,
			"Rows"       => 1,
			"ActionType" => $actionType,
			"ActionBody" => $actionBody,
			"Text"       => $text,
			"TextSize"   => $textSize,
			"Silent"     => $silent
		];
		if ($color) {
			$btn["BgColor"] = $color;
		}
		$this->buttons[] = $btn;
		return $this;
	}
}