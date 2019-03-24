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
                    <td>{{ props.item.user_id }}</td>
                    <td class="text-xs-right">
                        {{ props.item.client_id }}
                    </td>
                    <td class="text-xs-right">
                        {{ props.item.message }}
                    </td>
                    <td class="text-xs-right">{{ props.item.contact_at }}</td>
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
                    text: "Client",
                    align: "left",
                    sortable: true,
                    value: "client_id"
                },
                {
                    text: "User",
                    align: "left",
                    sortable: true,
                    value: "user_id"
                },
                {
                    text: "Message",
                    align: "left",
                    sortable: true,
                    value: "message"
                },
                {
                    text: "Date",
                    align: "right",
                    sortable: true,
                    value: "contact_at"
                }
            ]
        };
    },
    mounted() {
        this.$root.pageTitle = "Contacts";
    },
    created() {
        this.fetchData();
    },

    methods: {
        fetchData() {
            axios.get('/api/contacts').then( response => {
                this.contacts = response.data;
            });
        },
    },

};
</script>

<style scoped>
    .w-100 {
        width: 100%;
    }
</style>
