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
                :items="contacts"
                class="elevation-1 w-100"
            >
                <template v-slot:items="props">
                    <td>{{ props.item.product_name }}</td>
                    <td class="text-xs-right">
                        {{ props.item.product_status }}
                    </td>
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
            contacts: [],
            headers: [
                {
                    text: "Product name",
                    align: "left",
                    sortable: true,
                    value: "product_name"
                },
                {
                    text: "Product status",
                    align: "left",
                    sortable: true,
                    value: "product_status"
                },
            ]
        };
    },
    mounted() {
        this.$root.pageTitle = "Products";
    },
    methods: {
        newContact() {
            console.warn("*");
        }
    }
};
</script>

<style scoped>
    .w-100 {
        width: 100%;
    }
</style>
