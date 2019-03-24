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

            <template>
                <v-form>
                    <v-container>
                        <v-layout row wrap>
                            <v-flex xs12>
                                <v-text-field
                                    :value="pool ? pool.name : ''"
                                    label="Name"
                                    readonly
                                ></v-text-field>
                                <v-text-field
                                    :value="pool ? pool.numberclients : ''"
                                    label="Number of clients"
                                    readonly
                                ></v-text-field>
                                <v-text-field
                                    :value="pool ? pool.type_client_id : ''"
                                    label="Type of client"
                                    readonly
                                ></v-text-field>
                                <v-text-field
                                    :value="pool ? pool.product_id : ''"
                                    label="Product"
                                    readonly
                                ></v-text-field>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-form>
            </template>

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
            }
        },
        mounted() {
            this.$root.pageTitle = `Pool ${this.id}`;
        },
        methods: {
            fetchData() {
                axios.get(`/api/pools/${this.pool.id}/edit`).then( response => {
                    this.pool = response.data;
                });
            },
            getTypeClients() {
                axios.get('/api/type-clients').then( response => {
                    this.typeClients = response.data;
                });
            },
            getProducts() {
                axios.get('/api/products').then( response => {
                    this.products = response.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>
