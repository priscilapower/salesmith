<template>
    <v-container>
        <v-layout>
            <v-btn flat href="/">
                <v-icon left>keyboard_backspace</v-icon>
                <span class="mr-2">Back to the Dashboard</span>
            </v-btn>
            <v-spacer></v-spacer>
            <v-btn color="primary" @click="newContact()">
                <span class="mr-2">New client</span>
            </v-btn>
        </v-layout>
        <v-layout>
            <v-data-table
                    :headers="headers"
                    :items="clients"
                    class="elevation-1 w-100"
            >
                <template v-slot:items="props">
                    <td>{{ props.item.name }}</td>
                    <td class="text-xs-right">
                        {{ props.item.email }}
                    </td>
                    <td class="text-xs-right">
                        {{ props.item.phone }}
                    </td>
                    <td class="text-xs-right">
                        {{ props.item.status }}
                    </td>
                    <td class="text-xs-right">
                        {{ props.item.pool_name }}
                    </td>
                    <td class="text-xs-right">
                        {{ props.item.salesperson_name }}
                    </td>
                </template>
            </v-data-table>
        </v-layout>
    </v-container>
</template>

<script>
    export default {
        name: "Clients",
        data() {
            return {
                users: [],
                pools: [],
                clients: [],
                headers: [
                    {
                        text: "Name",
                        align: "left",
                        sortable: true,
                        value: "name"
                    },
                    {
                        text: "E-mail",
                        align: "left",
                        sortable: true,
                        value: "email"
                    },
                    {
                        text: "Phone",
                        align: "left",
                        sortable: true,
                        value: "phone"
                    },
                    {
                        text: "Status",
                        align: "left",
                        sortable: true,
                        value: "status"
                    },
                    {
                        text: "Pool",
                        align: "left",
                        sortable: true,
                        value: "pool_name"
                    },
                    {
                        text: "Salesperson",
                        align: "left",
                        sortable: true,
                        value: "salesperson_name"
                    },
                ]
            };
        },
        created() {
            this.fetchData();
           /* this.getTypeClients();
            this.getProducts();*/
        },
        mounted() {
            this.$root.pageTitle = "Clients";
        },
        methods: {
            fetchData() {
                axios.get('/api/clients').then( response => {
                    this.clients = response.data;
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
    .w-100 {
        width: 100%;
    }
</style>