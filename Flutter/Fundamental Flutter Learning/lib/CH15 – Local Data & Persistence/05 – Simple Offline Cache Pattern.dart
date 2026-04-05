/*
CH15 - 05
Simple Offline Cache Pattern (Last Known Data)

GOAL:
- Cache the last successful API response locally
- Show cached data immediately on next launch
- Update cache after successful fetch

CORE IDEA:

Pattern:
1) On startup:
   - load cached data (if exists) → show immediately
2) Fetch from network:
   - if success → update UI + update cache
   - if fail → keep showing cached data

This gives:
- faster startup
- basic offline resilience
*/

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';
import 'dart:convert';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: OfflineCachePage(),
    ),
  );
}

class OfflineCachePage extends StatefulWidget {
  const OfflineCachePage({super.key});

  @override
  State<OfflineCachePage> createState() => _OfflineCachePageState();
}

class _OfflineCachePageState extends State<OfflineCachePage> {
  static const String cacheKey = "cached_post_title";

  String? title; // shown in UI (cached or fresh)
  String status = "Starting...";

  @override
  void initState() {
    super.initState();
    _loadCacheThenFetch();
  }

  Future<void> _loadCacheThenFetch() async {
    await _loadCachedTitle();
    await _fetchAndUpdate();
  }

  Future<void> _loadCachedTitle() async {
    final prefs = await SharedPreferences.getInstance();
    final cached = prefs.getString(cacheKey);

    if (cached != null) {
      debugPrint("Loaded cached title: $cached");
      setState(() {
        title = cached;
        status = "Showing cached data";
      });
    } else {
      debugPrint("No cache found");
      setState(() {
        status = "No cache yet";
      });
    }
  }

  Future<void> _saveCachedTitle(String newTitle) async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setString(cacheKey, newTitle);
    debugPrint("Saved cache title: $newTitle");
  }

  Future<void> _fetchAndUpdate() async {
    setState(() {
      status = "Fetching from network...";
    });

    await Future.delayed(const Duration(seconds: 1)); // simulate delay
    final uri = Uri.https("jsonplaceholder.typicode.com", "/posts/1");

    try {
      final response = await http.get(uri).timeout(const Duration(seconds: 5));

      if (response.statusCode != 200) {
        throw Exception("Server error: ${response.statusCode}");
      }

      final decoded = jsonDecode(response.body);
      final fetchedTitle = decoded["title"] as String;

      debugPrint("Fetched title: $fetchedTitle");

      setState(() {
        title = fetchedTitle;
        status = "Showing fresh network data ✅";
      });

      await _saveCachedTitle(fetchedTitle);
    } catch (e) {
      debugPrint("Fetch failed: $e");

      setState(() {
        status = "Network failed → keep cached data";
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("CH15/05 – Offline Cache Pattern")),
      body: Center(
        child: Padding(
          padding: const EdgeInsets.all(20),
          child: Column(
            mainAxisSize: MainAxisSize.min,
            children: [
              Text(
                status,
                textAlign: TextAlign.center,
                style: const TextStyle(fontWeight: FontWeight.bold),
              ),
              const SizedBox(height: 16),
              Text(
                title ?? "(no title loaded yet)",
                textAlign: TextAlign.center,
                style: const TextStyle(fontSize: 18),
              ),
              const SizedBox(height: 20),
              ElevatedButton(
                onPressed: _fetchAndUpdate,
                child: const Text("Refresh (Network)"),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

/*
Mental Model:

Cache is "last known good state".

- Fast startup: show cached immediately
- Resilient: if network fails, app still has something to show

This is the simplest offline-first idea.
Later, databases (Hive/sqflite) scale this pattern to lists and complex data.
*/
