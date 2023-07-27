<?php declare(strict_types=1);

namespace PaulReviewSlider\Core\Content\Cms\DataResolver\Element;

use PaulReviewSlider\Core\Content\Cms\Service\ReviewSliderService;
use Shopware\Core\Content\Cms\Aggregate\CmsSlot\CmsSlotEntity;
use Shopware\Core\Content\Cms\DataResolver\CriteriaCollection;
use Shopware\Core\Content\Cms\DataResolver\Element\AbstractCmsElementResolver;
use Shopware\Core\Content\Cms\DataResolver\Element\ElementDataCollection;
use Shopware\Core\Content\Cms\DataResolver\ResolverContext\ResolverContext;
use Shopware\Core\Framework\DataAbstractionLayer\Exception\InconsistentCriteriaIdsException;

class ReviewSliderCmsElementResolver extends AbstractCmsElementResolver
{

    /**
     * @var ReviewSliderService
     */

    private $reviewSliderService;

    /**
     * ReviewSliderCmsElementResolver constructor.
     *
     * @param ReviewSliderService $reviewSliderService
     */

    public function __construct(ReviewSliderService $reviewSliderService)
    {

        $this->reviewSliderService = $reviewSliderService;

    }

    /**
     * @return string
     */

    public function getType(): string
    {

        return 'review-slider';

    }

    /**
     * @param CmsSlotEntity $slot
     * @param ResolverContext $resolverContext
     *
     * @return CriteriaCollection|null
     */

    public function collect(CmsSlotEntity $slot, ResolverContext $resolverContext): ?CriteriaCollection
    {

        return null;

    }

    /**
     * @param CmsSlotEntity $slot
     * @param ResolverContext $resolverContext
     * @param ElementDataCollection $result
     */

    public function enrich(CmsSlotEntity $slot, ResolverContext $resolverContext, ElementDataCollection $result): void
    {

        try {

            $configuration = $slot->getConfig();

            $reviewSliderItems = $this->reviewSliderService->getReviewSliderItems(
                $resolverContext->getSalesChannelContext()->getContext(),
                (int) $configuration['minRating']['value'],
                (int) $configuration['maxReviews']['value']
            );

            $slot->setData($reviewSliderItems);

        } catch (InconsistentCriteriaIdsException $e) {

            /**
             * unable to build review slider
             */

        }

    }

}
