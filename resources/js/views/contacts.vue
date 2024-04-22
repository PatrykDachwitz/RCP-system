<script setup>
import {inject} from "vue";

const lang = inject('lang');
</script>

<template>
    <div class="row w-100 m-0">
        <div class="col-md">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com">
                <label for="floatingInputGrid">{{ lang['firstName'] }}</label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com">
                <label for="floatingInputGrid">{{ lang['secondName'] }}</label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com">
                <label for="floatingInputGrid">{{ lang['emailAddress'] }}</label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com">
                <label for="floatingInputGrid">{{ lang['phoneNumber'] }}</label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com">
                <label for="floatingInputGrid">{{ lang['tittle'] }}</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">{{ lang['description'] }}</label>
        </div>

    </div>
</template>

<style scoped>

</style>
