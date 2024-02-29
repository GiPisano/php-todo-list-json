const { createApp } = Vue;

const app = createApp({
    data() {
        return{
            title: 'ToDo List',
        }
    }
});

app.mount('#app');