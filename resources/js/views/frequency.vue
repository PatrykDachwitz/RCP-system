<script setup>

</script>

<template>
    <div class="calendar d-flex flex-column">
        <div class="calendar-header">
            <template v-for="item in 7">
                <div class="calendar-header__tittle fs-5 py-2 ps-2">
                    <span>Pn</span>
                </div>
            </template>
        </div>
        <div class="calendar-body">
            <template v-for="item in 35">
                <div class="calendar-body__single position-relative">
                    <span class="calendar-body__single-day position-absolute top-0 start-0 p-2 fs-5 text-gray">12</span>
                    <div class="calendar-body__single-text-info fs-5 text-gray"><span class="text-blue">14:20</span> - <span class="text-danger">Brak</span></div>
                </div>
            </template>
        </div>
    </div>
</template>

<style scoped>

</style>
