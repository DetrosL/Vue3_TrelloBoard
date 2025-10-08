<script setup>
    import draggableComponent from "vuedraggable";
    import DragHandle from "./DragHandle.vue";
    import TodoCard from "./TodoCard.vue";
    import { ref, nextTick, inject } from 'vue'

    const list_todo     = inject('list_todo');
    const list_columns  = inject('list_columns');

    // fazer umas fixas: 
    /*  id: 0, titleC: Inbox, task: [9]
        id: 1, titleC: In Progress, task: []
        id: 2, titleC: Code Review, task: []
        id: 3, titleC: Ready for Testing, task: []
        id: 4, titleC: Awaiting Release, task: []
        id: 5, titleC: Inbox, task: []

        estrutura das task: 
            id: lastId + 1, titleT:'', descT: '', tagT: '',colorT: '', stepsT: [],

        estrutura dos steps:
            id: lastId + 1,titleS: '',
            completedS: true/false,
    */
</script>
<template>
    <div class="d-flex items-start overflow-x-auto overflow-y-auto">
        <!-- <draggableComponent
            v-model="list_columns"
            group="list_columns"
            item-key="id"
            :animation="150"
            handle=".drag-handle"
            class="flex gap-4 items-start"> -->

            <div v-for="column in list_columns" :key="column.id" class="column">
                <div class="header-col"><h1 class="title-col">{{ column.titleC }}</h1><h4 class="qt-col">00</h4></div>
                <div v-for="(task, i) in column.taskC" :key="i">
                    <TodoCard :task="list_todo[task]"/>
                </div>
            </div>
            <button type="button" class="btn btn-primary add-col text-dark" data-bs-toggle="modal" data-bs-target="#addColModal">
                <span class="material-symbols-outlined">
                add_2
                </span>
            </button>

        <!-- </draggableComponent,> -->
    </div>
</template>
<style scoped>
    .add-col{
        margin: 10px 20px 10px 30px;
        min-width: 300px;
        min-height: 500px;
        background-color: #f9fafb86;
        border-radius: 10px;
        border: 0;
        box-shadow: 0px 4px 4px #00000040;
    }

    .add-col:hover {
        background-color: #f9fafbc5;
    }
</style>