<template>
    <v-container>
        <v-layout>
            <v-btn flat href="/">
                <v-icon left>keyboard_backspace</v-icon>
                <span class="mr-2">Back to the Dashboard</span>
            </v-btn>
            <v-spacer></v-spacer>
            <client-form @refresh="fetchData()" :pools="pools" :users="users"></client-form>
        </v-layout>
        <v-layout>
            <v-data-table
                :headers="headers"
                :items="clients"
                class="elevation-1 w-100"
            >
                <template v-slot:items="props">
                    <tr @click="helpers.goLink(`/client/${props.item.id}`)">
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
                            {{ props.item.pool_id }}
                        </td>
                        <td class="text-xs-right">
                            {{ props.item.user_id }}
                        </td>
                    </tr>

                </template>
            </v-data-table>
        </v-layout>
    </v-container>
</template>

<script>
import ClientForm from "./ClientForm";
import {helpers} from "../../plugins/helpers";

export default {
    name: "Clients",
    components: {
        ClientForm
    },
    data() {
        return {
            helpers,
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
                    value: "pool_id"
                },
                {
                    text: "Salesperson",
                    align: "left",
                    sortable: true,
                    value: "user_id"
                }
            ]
        };
    },
    created() {
        this.fetchData();
        this.getPools();
        this.getUsers();
    },
    mounted() {
        this.$root.pageTitle = "Clients";
    },
    methods: {
        fetchData() {
            axios.get("/api/clients").then(response => {
                this.clients = response.data;
            });
        },
        getUsers() {
            axios.get("/api/users").then(response => {
                this.users = response.data;
            });
        },
        getPools() {
            axios.get("/api/pools").then(response => {
                this.pools = response.data;
            });
        }
    }
};
</script>

<style scoped>
.w-100 {
    width: 100%;
}
</style>
