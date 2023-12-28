<script setup>

import {Head} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryLink from "@/Components/PrimaryLink.vue";
import SimplePaginationMoreButton from "@/Components/SimplePaginationMoreButton.vue";
import {onMounted, ref} from "vue";

const {pagination} = defineProps({
  pagination: {
    type: Array,
    default: () => [],
  },
});

const resources = ref([]);

onMounted(() => {
  resources.value = [...pagination.data];
});

function addResources(newResources) {
  resources.value = [...resources.value, ...newResources];
}
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Resources</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <primary-link :href="route('resources.create')">Add resource</primary-link>
      </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">
      <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex justify-between"  v-for="resource in resources">
       <div>
         {{ resource.title }} by {{ resource.author }}
       </div>
       <div>
          <primary-link class="ml-auto" :href="route('resources.edit', resource.id)">Edit</primary-link>
       </div>
      </div>

        <div>
            <simple-pagination-more-button  :url="route('resources.index')" @next-page-data-fetched="addResources"/>
        </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>

</style>
