<template>
    <div class="inline-flex text-sm sm:text-base font-medium text-gray-700 bg-gray-100 rounded-full py-1 px-4 items-center">
        <slot></slot>
        <div class="pl-1 cursor-pointer" v-if="removeBtn" @click="$emit('remove')">
            <b-icon-x></b-icon-x>
        </div>
    </div>
</template>

<script>
import {BIconX} from "bootstrap-icons-vue";

export default {
    name: "Tag",
    props:{
        removeBtn: {
            type:Boolean,
            default:false
        }
    },
    emits:['remove'],
    components:{
        BIconX
    }
}
</script>
