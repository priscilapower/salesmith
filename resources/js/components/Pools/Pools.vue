<template>
    <v-container>
        <v-layout>
            <v-btn flat href="/">
                <v-icon left>keyboard_backspace</v-icon>
                <span class="mr-2">Back to the Dashboard</span>
            </v-btn>
            <v-spacer></v-spacer>
            <pool-form></pool-form>
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
    import PoolForm from "./PoolForm";

    export default {
        name: "Pools",
        components: {
            PoolForm,
        },
        data() {
            return {
                pools: [],
                headers: [
                    {
                        text: "Pool name",
                        align: "left",
                        sortable: true,
                        value: "name",
                        required: true,
                        type: "text",

                    },
                    {
                        text: "# potential clients",
                        align: "left",
                        sortable: true,
                        value: "numberclients",
                        required: true,
                        type: "text",

                    },
                    {
                        text: "Type of client",
                        align: "left",
                        sortable: true,
                        value: "typeclient_id",
                        type: "select",
                    },
                    {
                        text: "Product",
                        align: "left",
                        sortable: true,
                        value: "product_id",
                        type: "text",

                    }
                ],
                payloadTemplate: {
                    name: '',
                    numberclients: '',
                    typeclient_id: '',

                },

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