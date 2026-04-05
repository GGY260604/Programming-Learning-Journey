/*
API Service

GOAL:
- Handle network logic
- Keep UI clean
*/

import 'package:http/http.dart' as http;
import 'dart:convert';
import '../models/todo.dart';

class ApiService {
  static Future<Todo> fetchTodo() async {
    final url = Uri.parse("https://jsonplaceholder.typicode.com/todos/1");

    final response = await http.get(url);

    if (response.statusCode == 200) {
      final data = jsonDecode(response.body);

      return Todo.fromJson(data);
    } else {
      throw Exception("Failed to load data");
    }
  }
}
