import './component';
import './config';
import './preview';

Shopware.Service('cmsService').registerCmsElement({
    name: 'review-slider',
    label: 'sw-cms.elements.reviewSlider.label',
    component: 'sw-cms-el-review-slider',
    configComponent: 'sw-cms-el-config-review-slider',
    previewComponent: 'sw-cms-el-preview-review-slider',
    defaultConfig: {
        minRating: {
            source: 'static',
            value: 3
        },
        maxReviews: {
            source: 'static',
            value: 9
        },
        showImages: {
            source: 'static',
            value: false
        },
        showControls: {
            source: 'static',
            value: true
        },
        autoplay: {
            source: 'static',
            value: false
        },
        slideMinWidth: {
            source: 'static',
            value: '300px'
        },
        maxTextLength: {
            source: 'static',
            value: 150
        },
        textHeight: {
            source: 'static',
            value: '110px'
        }
    }
});
