<script setup>

</script>

<template>
    <div class="histories d-flex flex-column align-items-stretch">
        <template v-for="element in 25">
            <div class="history d-flex flex-column p-2">
                <div class="text-dark d-flex justify-content-between align-items-center">
                    <div class="text-dark">
                        <strong class="text-dark">12.02.2024 Poniedziałek</strong>
                        - Wejśćei: <span class="text-danger">6:15</span>
                        -
                        Wyjście: <span class="text-success">14:00</span>
                    </div>
                    <div>
                        <img src="/assets/add-gray.png" width="20" height="20" alt="add event history"/>
                    </div>
                </div>
                <div class="history-info text-dark ps-4 py-2"><strong class="text-dark">6:15</strong> - Zarejestrowao wyjśce słuzbowe</div>
                <div class="text-dark ps-4 py-2"><strong class="text-dark">6:15</strong> - ZArejestrowano wejśćie</div>
            </div>
        </template>
    </div>
</template>

<style scoped>

</style>
