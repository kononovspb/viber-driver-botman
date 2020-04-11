<?php

namespace Kononovspb\Drivers\Viber\Extensions;

use JsonSerializable;

class MenuTemplate implements JsonSerializable {
    private $type = 'picture';

    /**
     * @var string
     */
    protected $text;

    /**
     * @var array
     */
    protected $buttons;

    protected $imageUrl;

    protected $defaultHeight;

    /**
     * PictureTemplate constructor.
     *
     * @param string $imageUrl
     * @param string $text
     */
    public function __construct($text, $imageUrl, $defaultHeight = false) {
        $this->text = $text;
        $this->imageUrl = $imageUrl;
        $this->defaultHeight = $defaultHeight;
    }

    /**
     * @return array
     */
    public function jsonSerialize() {
        return [
            'type' => $this->type,
            'text' => $this->text,
            'media' => $this->imageUrl,
            'keyboard' => [
                'Type' => 'keyboard',
                'DefaultHeight' => $this->defaultHeight,
                'Buttons' => $this->buttons
            ]
        ];
    }

    /**
     * @param        $text
     * @param string $actionType
     * @param string $actionBody
     * @param string $textSize
     *
     * @return ViberMenuTemplate
     */
    public function addButton($text, $actionType = 'reply', $actionBody = 'reply to me', $textSize = 'regular', $color = null, $width = 6, $silent = false) {
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