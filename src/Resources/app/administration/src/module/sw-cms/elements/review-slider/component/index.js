import template from './sw-cms-el-review-slider.html.twig';
import './sw-cms-el-review-slider.scss';

Shopware.Component.register('sw-cms-el-review-slider', {
    template,

    mixins: [
        Shopware.Mixin.getByName('cms-element')
    ],

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.initElementConfig('review-slider');
        }
    }
});