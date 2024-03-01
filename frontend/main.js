const { createApp } = Vue;

const app = createApp({
    data() {
        return{
            title: 'ToDo List',
            toDoList: [],

            newItem: '',
        }
    },

    methods:{
        fetchToDoList(){
            axios.get('../backend/api/get-list.php').then((responde) => {
            this.toDoList = responde.data
            });
        },

        addNewToDo(){
            const item = this.newItem;
            console.log('da aggiunger' + item);
            this.newItem = '';

            const data = { item };

            const params = {
                headers: { 'Content-Type': 'multipart/form-data' },
            };

            // todo: modificare url in path
            axios.post('../backend/api/store-item.php', data, params)
            .then((response) => {
                this.toDoList = response.data
            });
        },
    },

    mounted(){
        this.fetchToDoList();
    }
});

app.mount('#app');