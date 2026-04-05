/*
CH13 - 05
Repository Pattern with Query Params and Pagination

GOAL:
- Build a realistic Repository layer
- Use query parameters properly
- Implement simple pagination
- Keep HTTP details inside Service

IMPORTANT:
Service = how to call API
Repository = what the app needs

Repository should expose clean methods like:
- fetchPosts(page, limit)
NOT:
- get("/posts?page=1&limit=10")
*/

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: PaginationDemoPage(),
    ),
  );
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
   Service Layer (HTTP only)
--------------------------*/

class PostService {
  final String baseHost = "jsonplaceholder.typicode.com";

  Future<List<Map<String, dynamic>>> fetchPostsJson({
    required int page,
    required int limit,
  }) async {
    // Build Uri with query parameters
    // Pagination params: _page, _limit
    final uri = Uri.https(baseHost, "/posts", {
      "_page": page.toString(),
      "_limit": limit.toString(),
    });

    debugPrint("Service: GET $uri");

    final response = await http.get(uri).timeout(const Duration(seconds: 5));

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

  Future<List<Post>> fetchPosts({required int page, required int limit}) async {
    final jsonList = await service.fetchPostsJson(page: page, limit: limit);

    return jsonList
        .map((json) => Post(id: json["id"], title: json["title"]))
        .toList();
  }
}

/* -------------------------
   UI Demo (Pagination)
--------------------------*/

class PaginationDemoPage extends StatefulWidget {
  const PaginationDemoPage({super.key});

  @override
  State<PaginationDemoPage> createState() => _PaginationDemoPageState();
}

class _PaginationDemoPageState extends State<PaginationDemoPage> {
  final repo = PostRepository(PostService());

  List<Post> posts = [];
  int currentPage = 1;
  final int limit = 5;

  bool isLoading = false;

  Future<void> loadNextPage() async {
    if (isLoading) return;

    setState(() => isLoading = true);

    debugPrint("UI: requesting page $currentPage");

    try {
      final newPosts = await repo.fetchPosts(page: currentPage, limit: limit);

      setState(() {
        posts.addAll(newPosts);
        currentPage++;
      });
    } catch (e) {
      debugPrint("Error: $e");
    }

    setState(() => isLoading = false);
  }

  @override
  void initState() {
    super.initState();
    loadNextPage();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH13/05 – Pagination Pattern')),
      body: Column(
        children: [
          Expanded(
            child: ListView.builder(
              itemCount: posts.length,
              itemBuilder: (context, index) {
                final post = posts[index];
                return ListTile(
                  title: Text(post.title),
                  subtitle: Text("ID: ${post.id}"),
                );
              },
            ),
          ),
          if (isLoading)
            const Padding(
              padding: EdgeInsets.all(12),
              child: CircularProgressIndicator(),
            ),
          ElevatedButton(
            onPressed: loadNextPage,
            child: const Text("Load Next Page"),
          ),
        ],
      ),
    );
  }
}

/*
Architecture Insights:

Service:
- Knows base URL
- Knows HTTP details
- Knows query parameters

Repository:
- Returns clean Domain objects
- Hides JSON shape

UI:
- Does not build URLs
- Does not parse JSON
- Only asks for page X

Next:
Full integration with Provider (Model + Repository + Async state).
*/
