/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import "./plugins/vuetify";

import Dashboard from "./components/Dashboard/Dashboard.vue";
import Pools from "./components/Pools/Pools.vue";
import Pool from "./components/Pools/Pool.vue";
import Client from "./components/Clients/Client.vue";
import Clients from "./components/Clients/Clients.vue";
import Contacts from "./components/Contacts/Contacts.vue";
import Products from "./components/Products/Products.vue";
import TypeClients from "./components/TypeClients/TypeClients.vue";
import "roboto-fontface/css/roboto/roboto-fontface.css";
import "material-design-icons-iconfont/dist/material-design-icons.css";
import "vuetify/dist/vuetify.min.css";
import Vuetify from "vuetify";
Vue.use(Vuetify);

import {helpers} from "./plugins/helpers";

const app = new Vue({
    el: "#app",
    components: {
        Dashboard,
        Client,
        Clients,
        Contacts,
        Pool,
        Pools,
        Products,
        TypeClients,
    },
    provide: function (){
        return {
            user: this.user,
            roleIds: this.roleIds
        };
    },
    mounted() {
        this.parseAttributes();
    },
    data: {
        user: {},
        roles: [],
        pageTitle: ""
    },
    computed: {
        roleIds() {
            if (this.roles.length) {
                return this.roles.map(role => role.id)
            }
            return [];
        }
    },
    methods: {
        parseAttributes() {
            this.user = this.$el.attributes.user ? JSON.parse(this.$el.attributes.user.value) : {};
            this.roles = this.$el.attributes.roles ? JSON.parse(this.$el.attributes.roles.value) : {};
        },
        signout() {
            axios.post('/logout').then(()=>{
                helpers.goLink('/')
            })
        }
    }
});
