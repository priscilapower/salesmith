<template>
    <v-container>
        <v-layout>
            <v-flex xs12>
                <div>
                    <v-card class="mx-3 my-3 cursor-pointer">
                        <v-card-title
                            ><span class="title">Pool #1</span></v-card-title
                        >
                        <v-card-text
                            class="d-flex justify-content-center align-items-center"
                        >
                            <v-flex class="text-xs-center">
                                <v-progress-circular
                                    :width="10"
                                    :size="200"
                                    :value="100"
                                    :color="'yellow'"
                                    >
                                    <div class="display-4"
                                        >12</div
                                    >
                                </v-progress-circular
                                >
                                <div class="subheading">Potential proposals</div>

                            </v-flex>

                            <v-flex class="text-xs-center">
                                <v-progress-circular
                                    :width="10"
                                    :size="200"
                                    :value="75"
                                    :color="'orange'"

                                ><span class="display-4"
                                        >9</span
                                    ></v-progress-circular
                                >
                                <div class="subheading">Clients</div>
                            </v-flex>

                            <v-flex class="text-xs-center">
                                <v-progress-circular
                                        :width="10"
                                        :size="200"
                                        :value="75"
                                        :color="'red'"

                                ><span class="display-4"
                                >9</span
                                ></v-progress-circular
                                >
                                <div class="subheading">Contacts (past 15 days)</div>
                            </v-flex>

                            <v-flex class="text-xs-center">
                                <v-progress-circular
                                        :width="10"
                                        :size="200"
                                        :value="50"
                                        :color="'purple'"

                                ><span class="display-4"
                                >6</span
                                ></v-progress-circular
                                >
                                <div class="subheading">Proposals</div>
                            </v-flex>
                        </v-card-text>
                    </v-card>
                </div>
            </v-flex>
        </v-layout>

        <v-layout>
            <v-flex xs12>
                <v-card class="mx-3 my-3">
                    <v-card-title
                        ><span class="title"
                            >Pool #1 mapped %</span
                        ></v-card-title
                    >
                    <v-card-text
                        class="d-flex justify-content-center align-items-center"
                    >
                        <v-sparkline
                            :value="trend"
                            :labels="trend"
                            show-labels
                            :gradient="['#F44','#000']"
                            :smooth="3"
                            :padding="10"
                            :line-width="2"
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
    name: "DashboardSales",
    data() {
        return {
            trend: [0, 5, 8, 18, 21, 23, 31, 34]
        };
    }
};
</script>

<style scoped></style>
