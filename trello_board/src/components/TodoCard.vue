<script setup>
    import { defineProps } from 'vue'

    const props = defineProps({
        task: Object,
        required: true
    })

</script>
<template>
    <div v-if="props.task" class="card" :style="{borderLeftColor: props.task.tagT[0].colorG }"  data-bs-toggle="modal" data-bs-target="#addTaskModal" >
        <div class="card0" >
            <div v-for="tag in props.task.tagT" :key="tag.id" class="card-color" :style="{backgroundColor: tag.colorG }"></div>
        </div>
        <div class="card1">
            <p>{{ props.task.titleT }}</p>
        </div>
        <div class="card2">

            <div class="card2-1">
                <a v-if="props.task.stepsT.length > 0" class="icons" href=""><!--steps-->
                    <span class="material-symbols-outlined text-dark s_check">check_box</span> {{ props.task.stepsT.filter(item => item === true).length }}/{{ props.task.stepsT.length }} 
                </a>
                <a v-if="false" class="icons"  href=""><!--props.task.comments-->
                    <span class="material-symbols-outlined text-dark s_comment">mode_comment</span>
                </a>
                <a v-if="false" class="icons"  href=""><!--props.task.attach-->
                    <span class="material-symbols-outlined text-dark s_attach">attachment</span>
                </a>
            </div>
            <div class="card2-2">
                <a v-if="true" class="icons"  href=""><!--props.task.circle-->
                    <span class="material-symbols-outlined text-dark">account_circle</span>
                    <span class="material-symbols-outlined text-dark">account_circle</span>
                </a>
            </div>
             
        </div>
    </div>
</template>
<style scoped>
    .card {
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
    }

    .card-color {
        width: 30px;
        height: 8px;
        border-radius: 10px;
        margin: 0 0 6px 0;
    }

    .card-color:not(:first-child) {
        margin: 0 0 6px 4px;
    }

    .card1 {
        height: 2em;
    }

    .card2 {
        height: 2em;
        background-color: #56b3657c;
        display: flex;
    }

    .card2-1 {
        width: 70%;
        display: flex;
    }

    .card2-2 {
        background: rgb(131, 158, 231);
        text-align: right;
        width: 30%;
    }

    .icons {
        text-decoration: none;
        color: #000;
        font-size: 16px;
        margin: auto 5px;
    }

    .icons > span {
        /* height: 100%; */
        padding: 5px 5px 0 0;
    }

    p {
        display: inline-block;
    }
</style>
