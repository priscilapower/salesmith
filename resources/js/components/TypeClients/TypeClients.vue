<template>
    <v-container>
        <v-layout>
            <v-btn flat href="/">
                <v-icon left>keyboard_backspace</v-icon>
                <span class="mr-2">Back to the Dashboard</span>
            </v-btn>
            <v-spacer></v-spacer>
            <v-btn color="primary" @click="newContact()">
                <span class="mr-2">New client type</span>
            </v-btn>
        </v-layout>
        <v-layout>
            <v-data-table
                    :headers="headers"
                    :items="typeClients"
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
        name: "TypeClients",
        data() {
            return {
                typeClients: [],
                headers: [
                    {
                        text: "Name",
                        align: "left",
                        sortable: true,
                        value: "name"
                    },
                ]
            };
        },
        mounted() {
            this.$root.pageTitle = "Client types";
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                axios.get('/api/type-clients').then( response => {
                    this.typeClients = response.data;
                });
            },
        }
    }
</script>

<style scoped>
    .w-100 {
        width: 100%;
    }
</style>