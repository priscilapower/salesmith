<template>
    <v-container>
        <v-layout>
            <v-btn flat href="/">
                <v-icon left>keyboard_backspace</v-icon>
                <span class="mr-2">Back to the Dashboard</span>
            </v-btn>
            <v-spacer></v-spacer>
            <client-form :payload-edit="client" :pools="pools" :users="users" @refresh="fetchData()"></client-form>
        </v-layout>
        <v-layout>

            <template>
                <v-form>
                    <v-container>
                        <v-layout row wrap>
                            <v-flex xs12>
                                <v-text-field
                                        :value="client ? client.name : ''"
                                        label="Name"
                                        readonly
                                ></v-text-field>
                                <v-text-field
                                        :value="client ? client.email : ''"
                                        label="Email"
                                        readonly
                                ></v-text-field>
                                <v-text-field
                                        :value="client ? client.phone : ''"
                                        label="Phone"
                                        readonly
                                ></v-text-field>
                                <v-text-field
                                        :value="client ? client.status : ''"
                                        label="Status"
                                        readonly
                                ></v-text-field>
                                <v-text-field
                                        :value="client ? client.user_id : ''"
                                        label="Salesperson"
                                        readonly
                                ></v-text-field>
                                <v-text-field
                                        :value="client ? client.pool_id : ''"
                                        label="Pool"
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
import ClientForm from "./ClientForm";

export default {
    name: "Client",
    props: ["id", "client"],
    components: {
        ClientForm
    },
    data() {
        return {
            users: [],
            pools: []
        };
    },
    created() {
        this.getPools();
        this.getUsers();
    },
    mounted() {
        this.$root.pageTitle = `Client ${this.id}`;
    },
    methods: {
        fetchData() {
            axios.get(`/api/clients/${this.client.id}/edit`).then(response => {
                this.client = response.data;
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

<style scoped></style>
