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
                                        item-text="name"
                                        item-value="id"
                                        label="Type of clients"
                                        v-model.number="payload.typeclient_id"
                                        required
                                ></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select
                                        :items="products"
                                        label="Products"
                                        item-text="name"
                                        item-value="id"
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
                    <v-btn color="blue darken-1" flat @click="saveForm()">Save</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
    export default {
        name: "PoolForm",
        props: ['typeClients', 'products'],
        data() {
            return {
                dialog: false,
                payload: this.makePayload(),
            }
        },
        methods: {
            makePayload() {
                return {
                    name: '',
                    numberclients: null,
                    typeclient_id: null,
                    product_id: null,
                }
            },

            saveForm() {
                let payload = {...this.payload}
                axios.post('/api/pools', payload).then(r => {
                    this.$emit('refresh');
                    this.dialog = false;
                    this.makePayload();
                })
            }
        }
    }
</script>

<style scoped>

</style>