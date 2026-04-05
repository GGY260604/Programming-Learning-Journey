/*
CH13 - 06
Full Integration: Provider Model + Repository + HTTP

GOAL:
- Connect everything into the real architecture
- UI is reactive only
- Model stores loading/data/error
- Repository returns domain models
- Service does HTTP + parsing

IMPORTANT:
UI should not:
- call http
- parse json
- do try/catch

Model should:
- call repository
- manage loading/data/error
- notifyListeners

Mental Model:
UI triggers "intent"
Model performs "use case"
UI re-renders from state
*/

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

void main() {
  runApp(const AppRoot());
}

/* -------------------------
   Domain Model
--------------------------*/

class Post {
  final int id;
  final String title;

  Post({required this.id, required this.title});
}

/* -------------------------
   Service Layer
--------------------------*/

class PostService {
  final String host = "jsonplaceholder.typicode.com";

  Future<List<Map<String, dynamic>>> fetchPostsJson() async {
    final uri = Uri.https(host, "/posts", {"_limit": "8"});

    debugPrint("Service: GET $uri");

    final response = await http
        .get(
          uri,
          headers: {"Accept": "application/json"},
        ) // headers tell server we want JSON, is optional
        .timeout(const Duration(seconds: 5));

    if (response.statusCode != 200) {
      throw Exception("Server error: ${response.statusCode}");
    }

    final List<dynamic> decoded = jsonDecode(response.body);
    return decoded.cast<Map<String, dynamic>>();
  }
}

/* -------------------------
   Repository Layer
--------------------------*/

class PostRepository {
  final PostService service;

  PostRepository(this.service);

  Future<List<Post>> fetchPosts() async {
    final jsonList = await service.fetchPostsJson();

    return jsonList
        .map((json) => Post(id: json["id"], title: json["title"]))
        .toList();
  }
}

/* -------------------------
   Provider Model (State Holder)
--------------------------*/

class PostModel extends ChangeNotifier {
  final PostRepository repo;

  PostModel(this.repo);

  bool isLoading = false;
  List<Post> posts = [];
  String? error;

  Future<void> load() async {
    isLoading = true;
    error = null;
    notifyListeners();

    debugPrint("Model: load()");

    try {
      posts = await repo.fetchPosts();
    } catch (e) {
      error = e.toString();
      posts = [];
    }

    isLoading = false;
    notifyListeners();
  }
}

/* -------------------------
   App Root (DI Container)
--------------------------*/

class AppRoot extends StatelessWidget {
  const AppRoot({super.key});

  @override
  Widget build(BuildContext context) {
    final repo = PostRepository(PostService());

    return ChangeNotifierProvider(
      create: (_) => PostModel(repo)..load(), // load data on creation
      child: const MaterialApp(
        debugShowCheckedModeBanner: false,
        home: PostPage(),
      ),
    );
  }
}

/* -------------------------
   UI
--------------------------*/

class PostPage extends StatelessWidget {
  const PostPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("CH13/06 – Full Integration")),
      body: Consumer<PostModel>(
        builder: (context, model, child) {
          if (model.isLoading) {
            return const Center(child: CircularProgressIndicator());
          }

          if (model.error != null) {
            return Center(
              child: Column(
                mainAxisSize: MainAxisSize.min,
                children: [
                  Text(
                    "Error: ${model.error}",
                    textAlign: TextAlign.center,
                    style: const TextStyle(color: Colors.red),
                  ),
                  const SizedBox(height: 12),
                  ElevatedButton(
                    onPressed: model.load,
                    child: const Text("Retry"),
                  ),
                ],
              ),
            );
          }

          return RefreshIndicator(
            onRefresh: model.load,
            child: ListView.builder(
              itemCount: model.posts.length,
              itemBuilder: (context, index) {
                final post = model.posts[index];
                return ListTile(
                  title: Text(post.title),
                  subtitle: Text("ID: ${post.id}"),
                );
              },
            ),
          );
        },
      ),
    );
  }
}

/*
Final Mental Model (the whole chapter):

UI:
- Display only
- Trigger actions

Model:
- Loading / Data / Error
- Calls repository

Repository:
- Returns domain models
- Hides JSON + API shape

Service:
- HTTP + status check + decode

This is scalable API architecture.
*/
