<template>
    <v-container>
        <v-layout>
            <v-flex xs4>
                <v-card class="mx-3 my-3">
                    <v-card-title
                        ><span class="title">Pools</span></v-card-title
                    >
                    <v-card-text
                        class="d-flex justify-content-center align-items-center"
                    >
                        <v-progress-circular
                            :width="10"
                            :size="200"
                            :value="100"
                            ><span class="display-4"
                                >12</span
                            ></v-progress-circular
                        >
                    </v-card-text>
                </v-card>
            </v-flex>
            <v-flex xs4>
                <v-card class="mx-3 my-3">
                    <v-card-title
                        ><span class="title"
                            >Potential leads</span
                        ></v-card-title
                    >
                    <v-card-text
                        class="d-flex justify-content-center align-items-center"
                    >
                        <v-progress-circular
                            :width="10"
                            :size="200"
                            :value="100"
                            ><span class="display-4"
                                >12</span
                            ></v-progress-circular
                        >
                    </v-card-text>
                </v-card>
            </v-flex>
            <v-flex xs4>
                <v-card class="mx-3 my-3">
                    <v-card-title
                        ><span class="title"
                            >Avg% pool mapped</span
                        ></v-card-title
                    >
                    <v-card-text
                        class="d-flex justify-content-center align-items-center"
                    >
                        <v-progress-circular
                            :width="10"
                            :size="200"
                            :value="100"
                            ><span class="display-4"
                                >12</span
                            ></v-progress-circular
                        >
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
        <v-layout>
            <v-flex xs6>
                <v-card class="mx-3 my-3">
                    <v-card-title
                        ><span class="title"
                            >Avg% mapped to proposal</span
                        ></v-card-title
                    >
                    <v-card-text
                        class="d-flex justify-content-center align-items-center"
                    >
                        <v-progress-circular
                            :width="10"
                            :size="200"
                            :value="100"
                            ><span class="display-4"
                                >12</span
                            ></v-progress-circular
                        >
                    </v-card-text>
                </v-card>
            </v-flex>
            <v-flex xs6>
                <v-card class="mx-3 my-3">
                    <v-card-title
                        ><span class="title"
                            >Contacts/day (last 15 days)</span
                        ></v-card-title
                    >
                    <v-card-text
                        class="d-flex justify-content-center align-items-center"
                    >
                        <v-sparkline
                            :value="trend"
                            :height="118"
                            :gradient="['#000', '#F44']"
                            :smooth="3"
                            :padding="3"
                            :line-width="3"
                            :stroke-linecap="'round'"
                            :gradient-direction="'right'"
                            auto-draw
                        ></v-sparkline>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
export default {
    name: "DashboardManager",
    data() {
        return {
            trend: [6, 7, 8, 3, 5, 9, 3, 1]
        };
    }
};
</script>

<style scoped></style>
