<script setup>
    import { ref } from 'vue'
    
    function newTask(){

    }    
</script>
<template>
    <div class="form-todo">
        <form @submit.prevent="newTask">
            <label>Title todo</label><br>
            <input 
                v-model="title_todo"
                type="text">
            <br>
            <label>Description todo</label><br>
            <textarea 
                v-model="title_todo"
                name=""
                id="">
            </textarea>
            <br>
            <label>Completed</label><br>
            <input 
                v-model="completed"
                type="radio"
                :value="true"> Yes
                
            <input 
                v-model="completed"
                type="radio"
                :value="false"> No

            <br><br>

           <button type="submit">Adicionar</button>
        </form>
    </div>
</template>
<style scoped>
    .form-todo {
        background-color: #3b3a3a;
        padding: 20px;
        max-width: 400px;
        margin: 0 auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    }

</style>