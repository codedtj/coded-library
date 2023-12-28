<template>
  <button :class="{ 'opacity-25': disabled}"
          :disabled="disabled"
          class="hover:bg-danger-200 hover:text-danger-800 focus:outline-none group flex items-center rounded-md bg-danger-100 text-danger-600 text-sm font-medium px-4 py-2">

    <b-icon-trash></b-icon-trash>
    <slot v-if="!short" class="ml-2">Delete</slot>
  </button>
</template>

<script>
import {BIconTrash} from "bootstrap-icons-vue";

export default {
  name: "DeleteButton",
  props: {
    disabled: Boolean,
    short: Boolean
  },
  components: {BIconTrash},
}
</script>

<style scoped>

</style>
