<script setup>
    import draggableComponent from "vuedraggable";
    import DragHandle from "./DragHandle.vue";
    import TodoCard from "./DragHandle.vue";
    import { ref, nextTick } from 'vue'

    const columns = list_columns;

</script>
<template>
    <div class="d-flex items-start overflow-x-auto gap-4">
        <draggableComponent
            v-model="columns"
            group="columns"
            item-key="id"
            :animation="150"
            handle=".drag-handle"
            class="flex gap-4 items-start">

        </draggableComponent>
    </div>
</template>
<style scoped>
</style>