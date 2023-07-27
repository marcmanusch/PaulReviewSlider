<?php declare(strict_types=1);

namespace PaulReviewSlider\Core\Content\Cms\Service;

use PaulReviewSlider\Core\Content\Cms\Struct\ReviewSliderItem;
use PaulReviewSlider\Core\Content\Cms\Struct\ReviewSliderItems;
use Shopware\Core\Content\Product\Aggregate\ProductReview\ProductReviewEntity;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Exception\InconsistentCriteriaIdsException;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\RangeFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Sorting\FieldSorting;

class ReviewSliderService
{

    /**
     * @var EntityRepository
     */

    private $productReviewRepository;

    /**
     * ProductReviewSliderService constructor.
     *
     * @param EntityRepository $productReviewRepository
     */

    public function __construct(EntityRepository $productReviewRepository)
    {

        $this->productReviewRepository = $productReviewRepository;

    }

    /**
     * @param Context $context
     * @param int $minRating
     * @param int $maxReviews
     *
     * @return ReviewSliderItems
     *
     * @throws InconsistentCriteriaIdsException
     */

    public function getReviewSliderItems($context, $minRating = 4, $maxReviews = 9)
    {

        $reviewSliderItems = new ReviewSliderItems();

        $productReviews = $this->getProductReviews($context, $minRating, $maxReviews);

        if (!empty($productReviews)) {

            /**
             * @var ProductReviewEntity $productReview
             */

            foreach ($productReviews as $productReview) {

                $product = $productReview->getProduct();

                if (!empty($product)) {

                    $reviewSliderItem = new ReviewSliderItem();

                    $reviewSliderItem->setProduct($product);

                    $reviewSliderItem->setComment($productReview->getContent());

                    $reviewSliderItem->setPoints($productReview->getPoints());

                    $reviewSliderItems->addItem($reviewSliderItem);

                }

            }

        }

        return $reviewSliderItems;

    }

    /**
     * Helper-function to get product reviews
     *
     * @param $context
     * @param int $minRating
     * @param int $maxReviews
     *
     * @return ProductReviewEntity[]
     *
     * @throws InconsistentCriteriaIdsException
     */

    private function getProductReviews($context, $minRating, $maxReviews)
    {

        $productReviews = [];

        $criteria = new Criteria();

        $criteria->addAssociation('product');
        $criteria->addAssociation('product.media');
        $criteria->addAssociation('product.cover');

        $criteria->addFilter(
            new EqualsFilter('product_review.status', 1),
            new RangeFilter('product_review.points', ['gte' => $minRating])
        );

        $criteria->addSorting(
            new FieldSorting('product_review.createdAt', FieldSorting::DESCENDING)
        );

        $criteria->setLimit($maxReviews);

        $searchResult = $this->productReviewRepository->search($criteria, $context);

        if (!empty($searchResult)) {

            $productReviews = $searchResult->getElements();

        }

        return $productReviews;

    }

}
