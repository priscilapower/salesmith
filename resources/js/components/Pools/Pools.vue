<template>
    <v-container>
        <v-layout>
            <v-btn flat href="/">
                <v-icon left>keyboard_backspace</v-icon>
                <span class="mr-2">Back to the Dashboard</span>
            </v-btn>
            <v-spacer></v-spacer>
            <v-btn color="primary" @click="newContact()">
                <span class="mr-2">New contact</span>
            </v-btn>
        </v-layout>
        <v-layout>
            <v-data-table
                    :headers="headers"
                    :items="pools"
                    class="elevation-1 w-100"
            >
                <template v-slot:items="props">
                    <td>{{ props.item.name }}</td>
                    <td class="text-xs-right">
                        {{ props.item.numberclients }}
                    </td>
                    <td class="text-xs-right">
                        {{ props.item.typeclient_name }}
                    </td>
                    <td class="text-xs-right">{{ props.item.product_name }}</td>
                </template>
            </v-data-table>
        </v-layout>
    </v-container>
</template>

<script>
    export default {
        name: "Pool",
        data() {
            return {
                contacts: [],
                headers: [
                    {
                        text: "Pool name",
                        align: "left",
                        sortable: true,
                        value: "name"
                    },
                    {
                        text: "# potential clients",
                        align: "left",
                        sortable: true,
                        value: "numberclients"
                    },
                    {
                        text: "Type of client",
                        align: "left",
                        sortable: true,
                        value: "typeclient_name"
                    },
                    {
                        text: "Product",
                        align: "product_name",
                        sortable: true,
                        value: "contacted_at"
                    }
                ]
            };
        },
        mounted() {
            this.$root.pageTitle = "Pools";
        }
    }
</script>

<style scoped>
    .w-100 {
        width: 100%;
    }
</style>