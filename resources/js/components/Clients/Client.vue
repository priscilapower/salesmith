<template>
    <v-container>
        <v-layout>
            <v-btn flat href="/">
                <v-icon left>keyboard_backspace</v-icon>
                <span class="mr-2">Back to the Dashboard</span>
            </v-btn>
            <v-spacer></v-spacer>
            <client-form :payload-edit="client" :type-clients="typeClients" :products="products" @refresh="fetchData()"></client-form>
        </v-layout>
        <v-layout>

            {{client}}

        </v-layout>
    </v-container>
</template>

<script>
    import ClientForm from "./ClientForm";

    export default {
        name: "Client",
        props: ['id', 'client'],
        components: {
            ClientForm,
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
            this.$root.pageTitle = `Client ${this.id}`;
        },
        methods: {
            fetchData() {
                axios.get(`/api/clients/${this.client.id}/edit`).then( response => {
                    this.client = response.data;
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