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
                :items="contacts"
                class="elevation-1 w-100"
            >
                <template v-slot:items="props">
                    <td>{{ props.item.client_name }}</td>
                    <td class="text-xs-right">
                        {{ props.item.client_status }}
                    </td>
                    <td class="text-xs-right">
                        {{ props.item.salesperson_name }}
                    </td>
                    <td class="text-xs-right">{{ props.item.contacted_at }}</td>
                </template>
            </v-data-table>
        </v-layout>
    </v-container>
</template>

<script>
export default {
    name: "Contacts",
    data() {
        return {
            contacts: [],
            headers: [
                {
                    text: "Client name",
                    align: "left",
                    sortable: true,
                    value: "client_name"
                },
                {
                    text: "Client status",
                    align: "left",
                    sortable: true,
                    value: "client_status"
                },
                {
                    text: "Salesperson",
                    align: "left",
                    sortable: true,
                    value: "salesperson_name"
                },
                {
                    text: "Date",
                    align: "right",
                    sortable: true,
                    value: "contacted_at"
                }
            ]
        };
    },
    mounted() {
        this.$root.pageTitle = "Contacts";
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
