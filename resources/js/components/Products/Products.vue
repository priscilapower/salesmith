<template>
    <v-container>
        <v-layout>
            <v-btn flat href="/">
                <v-icon left>keyboard_backspace</v-icon>
                <span class="mr-2">Back to the Dashboard</span>
            </v-btn>
            <v-spacer></v-spacer>
            <v-btn color="primary" @click="newContact()">
                <span class="mr-2">New product</span>
            </v-btn>
        </v-layout>
        <v-layout>
            <v-data-table
                :headers="headers"
                :items="products"
                class="elevation-1 w-100"
            >
                <template v-slot:items="props">
                    <td>{{ props.item.name }}</td>
                </template>
            </v-data-table>
        </v-layout>
    </v-container>
</template>

<script>
export default {
    name: "Products",
    data() {
        return {
            products: [],
            headers: [
                {
                    text: "Product name",
                    align: "left",
                    sortable: true,
                    value: "name"
                },
            ]
        };
    },
    created() {
        this.fetchData();
    },
    mounted() {
        this.$root.pageTitle = "Products";
    },
    methods: {
        fetchData() {
            axios.get('/api/products').then( response => {
                this.products = response.data;
            });
        },
    }
};
</script>

<style scoped>
    .w-100 {
        width: 100%;
    }
</style>
