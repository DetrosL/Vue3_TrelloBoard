<script setup>
    import { defineProps } from 'vue'

    const props = defineProps({
        task: Object,
        required: true
    })

    // const startDrag = (event, item) => {
    //     console.log(item);
    //     event.dataTransfer.dropEffect = 'move';
    //     event.dataTransfer.effectAllowed = 'move';
    //     event.dataTransfer.setData('idTask', item.id);
    // }

    // const onDrop = (event, list) => {
    //     const idTask = event.dataTransfer.getData('idTask')
    //     const task = list.value.find((task) => task.id == idTask)
    //     task.list = list
    // }

</script>
<template>
    <div v-if="props.task" class="card" :style="{borderLeftColor: props.task.tagT[0].colorG }"> <!--draggable="true" @dragstart="startDrag($event, props.task)"-->>
        <div v-for="tag in props.task.tagT" :key="tag.id" class="card0" >
            <div class="card-color" :style="{backgroundColor: tag.colorG }"></div>
        </div>
        <div class="card1">
            <p>{{ props.task.titleT }}</p>
        </div>
        <div class="card2">
            <a v-if="props.task.stepsT" href=""><!--steps-->
                <span class="material-symbols-outlined text-dark s_check">check_box</span> 
            </a>
            <!--<span v-if="true" class="material-symbols-outlined text-dark s_comment">mode_comment</span> comments
            <span v-if="true" class="material-symbols-outlined text-dark s_attach">attachment</span> attachment
            <span v-if="true" class="material-symbols-outlined text-dark s_user">account_circle</span> users-->
        </div>

    </div>
</template>
<style scoped>
    .card {
        display: flex;
        background-color: #fff;
        margin: 0 1em 1em 1em;
        box-shadow: 0 2px 4px #0000004d;
        height: 100px;
        width: 265px;
        border-radius: 10px;
        border-left: 4px solid;
        padding: 12px 12px 0 16px;
        transition: transform 0.2s, box-shadow 0.2s;
    }	

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 10px #00000080;
    }

    .card0 {
        display: flex;
        flex-direction: row;
        background: #dbd1d1;
    }

    .card-color {
        width: 30px;
        height: 8px;
        margin: 0 0 6px 0;
        border-radius: 10px;
    }

    .card1 {
        height: 2em;
    }

    .card2 {
        height: 2em;
        background-color: #ad9718;
        display: flex;
        justify-content: space-between;
        align-items: stretch;
    }
    /* .s_check{
        align-items: right;
        background: rgb(133, 131, 231);
    } */
</style>
