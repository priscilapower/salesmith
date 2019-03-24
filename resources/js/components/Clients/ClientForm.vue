<template>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" persistent max-width="600px">
            <template v-slot:activator="{ on }">
                <v-btn color="primary" dark v-on="on">{{payloadEdit ? 'Edit Client' : 'New Client'}}</v-btn>
            </template>
            <v-card>
                <v-card-title class="text-sm-right">
                    <span class="headline">Enter Client Data</span>
                </v-card-title>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-text-field label="Name*" v-model="payload.name" required></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field label="E-mail" v-model.number="payload.email" required></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field label="Phone" v-model.number="payload.phone" required></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field label="Status" v-model.number="payload.status" required></v-text-field>
                            </v-flex>

                            <v-flex xs12>
                                <v-select
                                        :items="pools"
                                        item-text="name"
                                        item-value="id"
                                        label="Pool"
                                        v-model.number="payload.pool_id"
                                        required
                                ></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select
                                        :items="users"
                                        label="Salesperson"
                                        item-text="name"
                                        item-value="id"
                                        v-model.number="payload.user_id"
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
        name: "ClientForm",
        props: ['payloadEdit', 'pools', 'users'],
        data() {
            return {
                dialog: false,
                payload: this.makePayload(),
            }
        },
        watch: {
            payloadEdit() {
                if (this.payloadEdit.hasOwnProperty('id')) {
                    this.payload = {...this.payloadEdit}
                }
            }
        },
        methods: {
            makePayload() {
                return {
                    name: '',
                    email: '',
                    phone: '',
                    status: '',
                    user_id: null,
                    pool_id: null,
                }
            },

            saveForm() {
                let payload = {...this.payload}
                if (this.payloadEdit) {
                    axios.put(`/api/clients/${this.payloadEdit.id}`, payload).then(r => {
                        this.$emit('refresh');
                        this.dialog = false;
                        this.makePayload();
                    })
                } else {
                    axios.post('/api/clients', payload).then(r => {
                        this.$emit('refresh');
                        this.dialog = false;
                        this.makePayload();
                    })
                }

            }
        }
    }
</script>

<style scoped>

</style>