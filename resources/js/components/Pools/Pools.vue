<template>
    <v-container>
        <v-layout>
            <v-btn
                    flat
                    href="/"
            >
                <span class="mr-2">Back to the Dashboard</span>
            </v-btn>
            Pools!
        </v-layout>
    </v-container>
</template>

<script>
    export default {
        name: "Pools",
        mounted() {
            this.$root.pageTitle = "Pools";
        }
    }
</script>

<style scoped>

</style>