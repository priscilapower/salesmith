<template>
    <div>
        <dashboard-manager v-if="roleIds.includes(1) || roleIds.includes(2)"></dashboard-manager>
        <dashboard-sales v-if="roleIds.includes(1) || roleIds.includes(3)"></dashboard-sales>
    </div>
</template>

<script>
import DashboardManager from "./DashboardManager";
import DashboardSales from "./DashboardSales";
export default {
    name: "Dashboard",
    props: ['roleIds'],
    components: {
        DashboardManager,
        DashboardSales
    },
};
</script>