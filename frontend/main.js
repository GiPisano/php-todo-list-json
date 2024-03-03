const { createApp } = Vue;

const app = createApp({
    data() {
        return{
            title: 'ToDo List',
            toDoList: [],

            newTask: 
                {
                    text: '',
                    done: false,
                },
        }
    },

    methods:{

        fetchToDoList(){
            axios.get('../backend/api/get-list.php').then((responde) => {
            this.toDoList = responde.data;
            });
        },

        // funzione per aggiungere una task
        addNewTask(){

            const data = { 
                text: this.newTask.text,
                done: false,
             };

            const params = {
                headers: { 'Content-Type': 'multipart/form-data' },
            };

            axios.post('../backend/api/store-item.php', data, params)
            .then((response) => {
                this.toDoList = response.data;
                this.newTask.text = '';
            });
        },

        // funzione che modifica lo stato da true a false 
        taskDone(task, index) {
            const newStatus = !task.done;
    
            const data = { 
                index,
                text: task.text,
                done: newStatus,
            };
    
            const params = {
                headers: { 'Content-Type': 'multipart/form-data' },
            };
    
            axios.post('../backend/api/update-task.php', data, params)
                .then((response) => {
                    this.toDoList = response.data;
                })
        },

        // funzione che elimina la task
        deleteTask(index){
    
            const data = { 
                index,
            };

            const params = {
                headers: { 'Content-Type': 'multipart/form-data' },
            };
    
            axios.post('../backend/api/delete-task.php', data, params)
                .then((response) => {
                    this.toDoList = response.data;
                })
        }
      
    },

    mounted(){
        this.fetchToDoList();
    }
});

app.mount('#app');