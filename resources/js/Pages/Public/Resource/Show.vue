<script setup>
import {defineProps} from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import EyeIcon from "@/Components/Icon/EyeIcon.vue";
import DownloadIcon from "@/Components/Icon/DownloadIcon.vue";

const {resource} = defineProps({
    resource: Object
})

function getTypeName(type) {
    const typeMap = {
        0: 'Book',
        1: 'Article',
        2: 'Video',
        3: 'Audio'
    };

    return typeMap[type] || '';
}
</script>

<template>
    <app-layout>
        <div class="bg-gray-100 py-28">
            <div class="md:container mx-auto bg-white rounded-xl p-10">
                <h1 class="text-2xl text-black font-bold md:text-4xl">{{ resource.title }}</h1>
                <p class="text-gray-600">by {{ resource.author }}</p>
                <p class="mt-6 text-gray-600">{{ resource.description }}</p>
                <p class="italic text-gray-700">Type: {{ getTypeName(resource.type) }}</p>
                <span v-if="resource.category"
                      class="inline-block px-2 py-1 mt-2 font-semibold rounded bg-blue-100 text-blue-800">
                      {{ resource.category.name }}
                    </span>
                <div class="flex mt-4 space-x-2">
                    <a :href="route('public.resources.view', resource.id)"
                       class="middle none relative h-10 max-h-[40px] w-10 max-w-[40px] rounded-lg bg-slate-700 text-center font-sans text-xs font-medium uppercase text-white shadow-md shadow-slate-700/20 transition-all hover:shadow-lg hover:shadow-slate-700/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                       data-ripple-light="true"
                       type="button"
                    >
                        <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                            <eye-icon class="text-2xl"></eye-icon>
                        </span>
                    </a>

                    <a :href="route('files.download', resource.file_id)"
                       class="middle none relative h-10 max-h-[40px] w-10 max-w-[40px] rounded-lg bg-slate-700 text-center font-sans text-xs font-medium uppercase text-white shadow-md shadow-slate-700/20 transition-all hover:shadow-lg hover:shadow-slate-700/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                       data-ripple-light="true"
                       type="button"
                    >
                        <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                            <download-icon class="text-2xl"></download-icon>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<style scoped>

</style>
