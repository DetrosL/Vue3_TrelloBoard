<script setup>
    import draggableComponent from "vuedraggable";
    import DragHandle from "./DragHandle.vue";
    import TodoCard from "./DragHandle.vue";
    import { ref, nextTick, inject } from 'vue'

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
                <div class="card">
                    <div class="card0">
                        <div class="cardcolor"></div> <!--v-for para cada cor q tiver-->
                    </div>
                    <div class="card1">
                        <p>Lorem ipsum.</p>
                    </div>
                    <div class="card2">
                        <span v-if="true" class="material-symbols-outlined text-dark s_check">check_box</span> <!--steps-->
                        <span v-if="true" class="material-symbols-outlined text-dark s_comment">mode_comment</span> <!--comments-->
                        <span v-if="true" class="material-symbols-outlined text-dark s_attach">attachment</span> <!--attachment-->
                        <span v-if="true" class="material-symbols-outlined text-dark s_user">account_circle</span> <!--users-->
                    </div>
                </div>
                <!-- <TodoCard /> -->
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
    .card {
        display: flex;
        background-color: #fff;
        margin: 0 1em 1em 1em;
        padding: 0.6em;
        padding: 0;
        border-radius: .5em;
        box-shadow: 0 2px 4px rgba(0,0,0,0.3);
        font-family: 'Arial', sans-serif;
        transition: transform 0.2s, box-shadow 0.2s;
        height: 6em;
    }	

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 10px #00000080;
    }

    .card1 {
        height: 2em;
        margin: .4em .4em 0;
    }

    .card2 {
        height: 2em;
        margin: .4em;
        background-color: #ad9718;
        display: flex;
        justify-content: space-between;
        align-items: stretch;
    }
    /* .s_user{
        align-items: right;
    } */

    .add-col{
        margin: 1.3em 1.3em 1.3em 1.5em;
        min-width: 19em;
        min-height: 30em;
        background-color: #f9fafb86;
        border-radius: 10px;
        border: 0;
        box-shadow: 0px 4px 4px #00000040;
    }

    .add-col:hover {
        background-color: #f9fafbc5;
    }
</style>