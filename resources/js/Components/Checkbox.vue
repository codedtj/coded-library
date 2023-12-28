<script setup>
import {computed, onMounted, ref} from 'vue';

const {checked, value} = defineProps({
    checked: {
        type: Boolean,
        default: false,
    },
    value: {
        default: null,
    },
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

const emit = defineEmits(['update:checked']);

const proxyChecked = computed({
    get() {
        return checked;
    },

    set(val) {console.log(val)
        emit("update:checked", val);
    },
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        type="checkbox"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :value="value"
        v-model="proxyChecked"
        ref="input"
    />
</template>
