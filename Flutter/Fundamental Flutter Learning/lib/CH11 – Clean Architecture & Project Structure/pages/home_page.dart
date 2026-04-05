/*
HomePage UI

GOAL:
- Extract smaller widgets
- Keep build() clean
- Improve readability
*/

import 'package:flutter/material.dart';
import '../services/api_service.dart';
import '../models/todo.dart';
import '../widgets/loading_widget.dart';

class HomePage extends StatefulWidget {
  const HomePage({super.key});

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  late Future<Todo> _future;

  @override
  void initState() {
    super.initState();
    _future = ApiService.fetchTodo();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Clean Architecture Demo")),
      body: FutureBuilder<Todo>(
        future: _future,
        builder: (context, snapshot) {
          if (snapshot.connectionState == ConnectionState.waiting) {
            return const LoadingWidget();
          }

          if (snapshot.hasError) {
            return ErrorView(message: snapshot.error.toString());
          }

          if (snapshot.hasData) {
            return TodoView(todo: snapshot.data!);
          }

          return const SizedBox();
        },
      ),
    );
  }
}

/*
================================================
Extracted Widgets
================================================
*/

/*
Widget to display error.
*/
class ErrorView extends StatelessWidget {
  final String message;

  const ErrorView({super.key, required this.message});

  @override
  Widget build(BuildContext context) {
    return Center(
      child: Text(
        message,
        style: const TextStyle(color: Colors.red),
        textAlign: TextAlign.center,
      ),
    );
  }
}

/*
Widget to display Todo data.
*/
class TodoView extends StatelessWidget {
  final Todo todo;

  const TodoView({super.key, required this.todo});

  @override
  Widget build(BuildContext context) {
    return Center(
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          Text(
            todo.title,
            style: const TextStyle(fontSize: 20),
            textAlign: TextAlign.center,
          ),
          const SizedBox(height: 10),
          Text("Completed: ${todo.completed}"),
        ],
      ),
    );
  }
}
