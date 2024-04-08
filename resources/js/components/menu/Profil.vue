<script setup>

</script>

<template>
    <section class="profile d-none d-lg-flex flex-column px-4 pt-5 text-start">
        <img src="/assets/profil.png" width="150" height="150"  alt="home" class="rounded-circle"/>
        <div class="profile__detail">
            <h2 class="mt-2 fs-3">Patryk Dachwitz</h2>
            <ul class="list-unstyled fs-6">
                <li>Stanowisko: Pracownik</li>
                <li>Dział: Sprzedaż</li>
            </ul>
        </div>
        <div>
            @for($i = 0; $i < 4; $i++)
            <div class="mt-3">
                <h3 class="fs-5">Czas pracy</h3>
                <div class="rounded-2 profile__marker position-relative overflow-hidden text-center">
                    <span class="profile__marker-time position-relative">100 / 120H</span>
                    <div class="rounded-2 profile__marker-done position-absolute start-0 top-0 w-50 h-100"></div>
                </div>
            </div>
            @endfor
        </div>

    </section>
</template>

<style scoped>

</style>
