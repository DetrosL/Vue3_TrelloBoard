<script setup>
    import { defineProps } from 'vue'

    const props = defineProps({
        task: Object,
        required: true
    })

    console.log('console2:'+props.task);

</script>
<template>
    <div v-if="props.task" class="card">
        <div class="card0">
            <div class="card-color"></div> <!--v-for para cada cor q tiver-->
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
        box-shadow: 0 2px 4px rgba(0,0,0,0.3);
        height: 100px;
        width: 265px;
        border-radius: 10px;
        border-left: 4px solid #FB2C36;
        padding: 12px 12px 0 16px;
        transition: transform 0.2s, box-shadow 0.2s;
    }	

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 10px #00000080;
    }

    .card-color {
        width: 30px;
        height: 8px;
        background-color: red;
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
