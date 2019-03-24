<template>
    <v-container>
        <v-layout>
            <v-btn flat href="/">
                <v-icon left>keyboard_backspace</v-icon>
                <span class="mr-2">Back to the Dashboard</span>
            </v-btn>
            <v-spacer></v-spacer>
            <pool-form :payload-edit="pool" :type-clients="typeClients" :products="products" @refresh="fetchData()"></pool-form>
        </v-layout>
        <v-layout>

            {{pool}}

        </v-layout>
    </v-container>
</template>

<script>
    import PoolForm from "./PoolForm";

    export default {
        name: "Pool",
        props: ['id', 'pool'],
        components: {
            PoolForm,
        },
        data() {
            return {
                typeClients: [],
                products: [],
            };
        },
        watch: {
            id(){
                console.log(id);
                if(this.id) {
                    console.log(this.id)
                    this.fetchData();
                }
            }
        },
        created() {
            this.getTypeClients();
            this.getProducts();
            if(this.id) {
                console.log(this.id)
                this.fetchData();
            }
        },
        mounted() {
            this.$root.pageTitle = `Pool ${this.id}`;
        },
        methods: {
            fetchData() {
                axios.get(`/api/pool/${this.pool.id}`).then( response => {
                    this.pool = response.data;
                });
            },
            getTypeClients() {
                axios.get('/api/type-clients').then( response => {
                    this.typeClients = response.data.data;
                });
            },
            getProducts() {
                axios.get('/api/products').then( response => {
                    this.products = response.data.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>