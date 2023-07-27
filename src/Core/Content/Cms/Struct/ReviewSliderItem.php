<?php declare(strict_types=1);

namespace PaulReviewSlider\Core\Content\Cms\Struct;

use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\Struct\Struct;

class ReviewSliderItem extends Struct
{

    /**
     * @var string
     */

    private $comment;

    /**
     * @var float
     */

    private $points;

    /**
     * @var ProductEntity|null
     */

    private $product;

    /**
     * @return string
     */

    public function getComment()
    {

        return $this->comment;

    }

    /**
     * @param $comment
     */

    public function setComment($comment)
    {

        $this->comment = $comment;

    }

    /**
     * @return float
     */

    public function getPoints()
    {

        return $this->points;

    }

    /**
     * @param $points
     */

    public function setPoints($points)
    {

        $this->points = $points;

    }

    /**
     * @return ProductEntity|null
     */

    public function getProduct()
    {

        return $this->product;

    }

    /**
     * @param $product
     */

    public function setProduct($product)
    {

        $this->product = $product;

    }

}
