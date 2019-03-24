<template>
    <div>
        <dashboard-manager></dashboard-manager>
        <dashboard-sales></dashboard-sales>
    </div>
</template>

<script>
import DashboardManager from "./DashboardManager";
import DashboardSales from "./DashboardSales";
export default {
    name: "Dashboard",
    components: {
        DashboardManager,
        DashboardSales
    },
};
</script>