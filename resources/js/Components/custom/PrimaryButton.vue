<script setup>

</script>

<template>
    <button class="button text-[13px]"><slot></slot></button>

</template>

<style scoped>
/* inspired form gumroad website */
.button {
    --bg: #000;
    --hover-bg: #ff90e8;
    --hover-text: #000;
    color: #fff;
    cursor: pointer;
    border: 1px solid var(--bg);
    border-radius: 4px;
    padding: 0.5em 1em;
    background: var(--bg);
    transition: 0.2s;
    width: 100%;
}

.button:hover {
    color: var(--hover-text);
    transform: translate(-0.25rem, -0.25rem);
    background: var(--hover-bg);
    box-shadow: 0.25rem 0.25rem var(--bg);
}

.button:active {
    transform: translate(0);
    box-shadow: none;
}

</style>
