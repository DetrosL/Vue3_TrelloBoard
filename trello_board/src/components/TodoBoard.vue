<script setup>
    import draggableComponent from "vuedraggable";
    import DragHandle from "./DragHandle.vue";
    import TodoCard from "./TodoCard.vue";
    import { ref, nextTick, inject } from 'vue'

    const list_todo     = inject('list_todo');
    const list_columns  = inject('list_columns');
</script>
<template>
    <div class="d-flex items-start overflow-x-auto overflow-y-auto" style="margin-bottom: 70px;">
        <div v-for="column in list_columns" :key="column.id" class="column"> <!--@drop="onDrop($event, column.taskC)" @dragenter.prevent @dragover.prevent-->
            <div class="header-col"><h1 class="title-col">{{ column.titleC }}</h1><h4 class="qt-col">{{ column.taskC.length }}</h4></div>
            <div v-for="(task, i) in column.taskC" :key="i">
                <TodoCard :task="list_todo[task]"/>
            </div>
        </div>
        <button type="button" class="btn btn-primary add-col text-dark" data-bs-toggle="modal" data-bs-target="#addColModal">
            <span class="material-symbols-outlined">
            add_2
            </span>
        </button>
    </div>
</template>
<style scoped>
    .add-col{
        margin: 20px 20px 10px 30px;
        min-width: 300px;
        min-height: 500px;
        /* max-height: 500px; */
        background-color: #f9fafb56;
        border-radius: 10px;
        border: 0;
        box-shadow: 0px 4px 4px #00000040;
    }

    .add-col:hover {
        background-color: #f9fafbc9;
    }


</style>