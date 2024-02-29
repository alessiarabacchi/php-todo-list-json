var app = new Vue({
  el: "#app",
  data: {
    newTodo: "",
    todos: [],
  },
  methods: {
    addTodo: function () {
      const newTodoText = this.newTodo.trim();
      if (newTodoText) {
        axios
          .post("todo.php", { todo: newTodoText })
          .then((response) => {
            this.todos.push(newTodoText);
            this.newTodo = "";
          })
          .catch((error) => {
            console.error("Errore:", error);
          });
      }
    },
  },
  created: function () {
    this.fetchTodos();
  },
});
