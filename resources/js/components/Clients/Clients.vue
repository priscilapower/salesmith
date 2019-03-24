<template>
    <v-container>
        <v-layout>
            <v-btn
                    flat
                    href="/"
            >
                <span class="mr-2">Back to the Dashboard</span>
            </v-btn>
            Clients!
        </v-layout>
    </v-container>
</template>

<script>
    export default {
        name: "Pools",
        mounted() {
            this.$root.pageTitle = "Clients";
        }
    }
</script>

<style scoped>

</style>