<template>
  <v-app>
    <v-toolbar app>
      <v-toolbar-title class="headline text-uppercase">
        <span>Salesmith</span>
        <span class="font-weight-light">Manager Dashboard</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn
        flat
        href="https://github.com/vuetifyjs/vuetify/releases/latest"
        target="_blank"
      >
        <span class="mr-2">A button!</span>
      </v-btn>
    </v-toolbar>

    <v-content>
      <dashboard-manager></dashboard-manager>
    </v-content>
  </v-app>
</template>

<script>

  import DashboardManager from "./DashboardManager";
export default {
  name: 'App',
  components: {
      DashboardManager
  },
  data () {
    return {
      //
    }
  }
}
</script>
