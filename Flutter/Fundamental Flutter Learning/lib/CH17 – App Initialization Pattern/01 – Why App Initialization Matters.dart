/*
CH17 - 01
Why App Initialization Matters

GOAL:
- Understand why apps need startup logic
- Separate startup logic from UI logic
- Prepare for async bootstrap

CORE IDEA:

Real apps must:
- Check login state
- Load saved settings
- Initialize services
- Load cached data

But:
runApp() is synchronous.

So we need an initialization pattern.

This file demonstrates:
Fake initialization delay before app becomes usable.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: AppInitializationDemo(),
    ),
  );
}

class AppInitializationDemo extends StatefulWidget {
  const AppInitializationDemo({super.key});

  @override
  State<AppInitializationDemo> createState() => _AppInitializationDemoState();
}

class _AppInitializationDemoState extends State<AppInitializationDemo> {
  bool isInitialized = false;

  @override
  void initState() {
    super.initState();
    _initializeApp();
  }

  Future<void> _initializeApp() async {
    debugPrint("Starting app initialization...");

    await Future.delayed(const Duration(seconds: 2));

    debugPrint("Initialization completed.");

    setState(() {
      isInitialized = true;
    });
  }

  @override
  Widget build(BuildContext context) {
    if (!isInitialized) {
      return const Scaffold(body: Center(child: CircularProgressIndicator()));
    }

    return const Scaffold(
      body: Center(
        child: Text(
          "App Ready 🚀",
          style: TextStyle(fontSize: 26, fontWeight: FontWeight.bold),
        ),
      ),
    );
  }
}

/*
Mental Upgrade:

Initialization is:
- Async
- Happens before real UI loads

In real app:
- Load token
- Load theme preference
- Setup dependency injection
- Prepare repositories

Next:
Future BEFORE runApp().
*/
