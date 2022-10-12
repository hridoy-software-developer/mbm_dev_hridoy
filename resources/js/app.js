require('./bootstrap');

/* ----- load Core Dependency ----- */
import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import {Inertia} from "@inertiajs/inertia";
import helpers from '@/helpers.js';

/* ----- load Components ----- */
import BaseLayout from '../views/pages/Shared/BaseLayout.vue';
import Sidebar from '../views/pages/Shared/Sidebar.vue';
import Header from '../views/pages/Shared/Header.vue';
import BackendLayout from '../views/pages/Shared/BackendLayout.vue';
import Pagination from '../views/pages/Shared/Pagination.vue';
window.Inertia = Inertia;

import { createToaster } from "@meforma/vue-toaster";
window.toaster = createToaster({
    position: "top-right",
    duration: 2000
});

/* ----- load Processing ----- */ 
InertiaProgress.init();

createInertiaApp({
    resolve: (name) => require(`../views/pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
        .use(plugin)
        .use(Inertia)
        .component('Head', Head)
        .component('Link', Link)
        .component('BaseLayout', BaseLayout)
        .component('Sidebar', Sidebar)
        .component('Header', Header)
        .component('BackendLayout', BackendLayout)
        .component('Pagination', Pagination)
        .mixin({
            data(){
                return {}
            },
            computed: {
                 pageFlashes () {
                    return this.$page.props.flash.message
                }
            },
            methods:{
                ...helpers
            }
        })
        .mount(el);
    },
});