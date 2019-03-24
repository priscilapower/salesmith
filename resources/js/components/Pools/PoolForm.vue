<template>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" persistent max-width="600px">
            <template v-slot:activator="{ on }">
                <v-btn color="primary" dark v-on="on">New Pool</v-btn>
            </template>
            <v-card>
                <v-card-title class="text-sm-right">
                    <span class="headline">Enter Pool Data</span>
                </v-card-title>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-text-field label="Name*" v-model="payload.name" required></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field label="# clients" v-model.number="payload.numberclients" required></v-text-field>
                            </v-flex>

                            <v-flex xs12>
                                <v-select
                                        :items="typeClients"
                                        label="Type of clients"
                                        v-model.number="payload.typeclient_id"
                                        required
                                ></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select
                                        :items="products"
                                        label="Products"
                                        v-model.number="payload.product_id"
                                        required
                                ></v-select>
                            </v-flex>

                        </v-layout>
                    </v-container>
                    <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" flat @click="dialog = false">Close</v-btn>
                    <v-btn color="blue darken-1" flat @click="dialog = false">Save</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
    export default {
        name: "Form",
        props: ['mode', 'entityName'],
        data() {
            return {
                dialog: false,
                payload: this.makePayload(),
                pools: [],
                typeClients: []
            }
        },
        methods: {
            makePayload() {
                return {
                    name: '',
                    numberclients: 0,
                    typeclient_id: null,
                    product_id: null,
                }
            }
        }
    }
</script>

<style scoped>

</style>