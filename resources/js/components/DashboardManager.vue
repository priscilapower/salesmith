<template>
    <v-container>
        <v-layout>
            <v-flex xs4>
                <v-card class="mx-3 my-3">
                    <v-card-title>Pools</v-card-title>
                    <v-card-text>
                        <v-progress-circular :size="50"></v-progress-circular>
                    </v-card-text>
                </v-card>
            </v-flex>
            <v-flex xs4>
                <v-card class="mx-3 my-3">
                    <v-card-title>Potential leads</v-card-title>
                </v-card>
            </v-flex>
            <v-flex xs4>
                <v-card class="mx-3 my-3">
                    <v-card-title>Avg. pool mapped</v-card-title>
                </v-card>
            </v-flex>
        </v-layout>
        <v-layout>
            <v-flex xs6>
                <v-card class="mx-3 my-3">
                    <v-card-title>Avg. mapped to proposal</v-card-title>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    export default {
        name: "DashboardManager"
    }
</script>

<style scoped>

</style>