import template from './sw-cms-el-config-review-slider.html.twig';

const { Component, Mixin } = Shopware;

Component.register('sw-cms-el-config-review-slider', {
    template,

    mixins: [
        Mixin.getByName('cms-element')
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