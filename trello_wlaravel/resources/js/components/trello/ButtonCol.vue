<script setup lang="ts">
    const emit = defineEmits(['add-col']);

    function openCol() {
        emit('add-col');
        console.log("teste_col")
    }
</script>
<template>
    <button type="button" class="trello-add-col text-gray-900" @click="openCol"> <!--dark:text-white-->
        <span class="material-icons">add_2</span>
    </button>
</template>