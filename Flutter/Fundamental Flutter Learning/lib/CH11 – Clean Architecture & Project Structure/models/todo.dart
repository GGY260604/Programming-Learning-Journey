/*
Todo Model

GOAL:
- Represent API data
- Convert JSON → Dart object
*/

class Todo {
  final int id;
  final String title;
  final bool completed;

  Todo({required this.id, required this.title, required this.completed});

  /*
  Factory constructor converts JSON map into Todo object.
  */
  factory Todo.fromJson(Map<String, dynamic> json) {
    return Todo(
      id: json["id"],
      title: json["title"],
      completed: json["completed"],
    );
  }
}

/*
------------------------------------------------
🧠 WHY MODEL?
------------------------------------------------

Instead of using Map everywhere,
we convert JSON into structured object.

Better:
todo.title

Instead of:
data["title"]
*/
