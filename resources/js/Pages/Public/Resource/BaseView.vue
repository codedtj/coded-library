<template>
    <app-layout class="relative">
        <div style="height: 100vh">
            <iframe allowfullscreen :src="route('files.view', resource.file_id)"/>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";

export default {
    name: "BaseView",
    components: {AppLayout},
    mounted() {
    },
    props: {
        resource: Object
    }
}
</script>

<style>
iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding-top: 78px;
}
</style>
