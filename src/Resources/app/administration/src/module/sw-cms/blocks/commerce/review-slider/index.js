import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    name: 'review-slider',
    label: 'sw-cms.blocks.commerce.reviewSlider.label',
    category: 'commerce',
    component: 'sw-cms-block-review-slider',
    previewComponent: 'sw-cms-block-preview-review-slider',
    defaultConfig: {
        marginBottom: '20px',
        marginTop: '20px',
        marginLeft: '20px',
        marginRight: '20px',
        sizingMode: 'boxed'
    },
    slots: {
        content: 'review-slider'
    }
});