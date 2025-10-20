<script setup>
    const emit = defineEmits(['add-task']);

    function openAdd(){
        emit('add-task');
        console.log('HeaderT: openAdd', openAdd);
    }
</script>
<template>
    <header class="flex justify-between items-center bg-gray-100 text-gray-900 px-4 py-2 sticky top-0 z-50">
        <div class="flex items-center">
        <a href="#" class="flex items-center">
            <img src="../../assets/freeline.png" alt="freeline" class="w-10" />
        </a>
        </div>

        <nav class="hidden md:block">
        <ul class="flex space-x-6 text-sm">
            <li><a href="#" class="hover:text-gray-600">Workspaces</a></li>
            <li><a href="#" class="hover:text-gray-600">Recent</a></li>
            <li><a href="#" class="hover:text-gray-600">Starred</a></li>
            <li><a href="#" class="hover:text-gray-600">Templates</a></li>
            <li>
                <button type="button" class="trello-button-create" @click="openAdd"> Create</button>
                <!-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</button> -->
            </li>
        </ul>
        </nav>

        <div class="flex items-center space-x-3">
        <input type="text" placeholder="Search" class="border border-gray-300 rounded-md px-3 py-1.5 text-sm focus:outline-none focus:ring focus:ring-gray-200" />

        <a href="#"><span class="material-icons text-gray-800">notifications</span></a>
        <a href="#"><span class="material-icons text-gray-800">help</span></a>
        <a href="#"><span class="material-icons text-gray-800">account_circle</span></a>

        <button class="md:hidden p-2 rounded hover:bg-gray-200">
            <span class="material-icons">menu</span>
        </button>
        </div>
    </header>

    <header class="flex justify-between items-center bg-[#212529] text-gray-100 px-4 py-2">
        <div class="flex items-center space-x-4">
        <h5 class="text-base font-medium">Development Sprint Board</h5>
        <a href="#" class="text-gray-300 hover:text-white flex items-center space-x-1">
            <span class="material-icons text-sm">grid_on</span>
            <span>Board</span>
        </a>
        </div>
        <button class="bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded-md text-sm font-medium transition" @click=""> Search </button>
    </header>
</template>
<style scoped>
.trello-button-create {
    background-color: #2673e7;
    color: white;
    padding: 5px 16px;
    border-radius: 5px;
}
.trello-button-create:hover {
    background-color: #1b5fc4;
}
</style>