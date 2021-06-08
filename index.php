
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Document</title>
</head>
<body>
  <div class="container mt-5">
    <div class="col-md-4 offset-md-4">

        <div id="app">
        {{ message }}
            <div class="container mt-5">
                <input class="form-control mb-3" type="text" v-model='newTask'>
                <button class="btn btn-success mb-3" @click="addNewTask">Добавить задачу</button>
                    <table class="table bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Задача</th>
                                <th>Удалить</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='(task, i) in tasks' :key='task.id'>
                                <td>{{task.id}}</td>
                                <td>{{task.task}}</td>
                                <td>
                                    <button @click="delTask(i, task.id)" class="btn btn-danger">X</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    </div>
    <!-- TEST  fasfasfasf-->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>
            var app = new Vue({
            el: '#app',
            data: {
            tasks: [],
            newTask: null,
            message: 'Hello Vue!'
        },
        methods: {
            updateLocalStorage () {
                delete localStorage.tasks
                const tasks = JSON.stringify(this.tasks)
                localStorage.tasks = tasks
            },
                    addNewTask () {
                        this.tasks.push(this.newTask)
                        const params = {
                            task: this.newTask
                        }
                        
                        axios.post('addNewTask.php', params)
                        .then(({data}) => {
                            this.tasks = data
                            this.newTask = null
                            this.updateLocalStorage()
                        })
                    },
                    delTask (i, id) {
                        this.tasks.splice(i, 1)
                        const params = {
                            id
                        }
                        axios.post('delTask.php', params)
                        .then(({data}) => {
                            this.tasks = data
                            this.updateLocalStorage()
                        })
                        
                    }
            },
            created () {
                if(typeof localStorage.tasks !== 'undefined') {
                    this.tasks = JSON.parse(localStorage.tasks)
                }
                
            }
        })

        
    </script>
    
    

</body>
</html>


