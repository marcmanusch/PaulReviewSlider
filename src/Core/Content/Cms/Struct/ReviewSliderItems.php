<?php declare(strict_types=1);

namespace PaulReviewSlider\Core\Content\Cms\Struct;

use Shopware\Core\Framework\Struct\Struct;

class ReviewSliderItems extends Struct
{

    /**
     * @var ReviewSliderItem[]
     */

    private $items = [];

    /**
     * @return ReviewSliderItem[]
     */

    public function getItems()
    {

        return $this->items;

    }

    /**
     * @param $items
     */

    public function setItems($items)
    {

        $this->items = $items;

    }

    /**
     * @param $item
     */

    public function addItem($item)
    {

        $this->items[] = $item;

    }

}
