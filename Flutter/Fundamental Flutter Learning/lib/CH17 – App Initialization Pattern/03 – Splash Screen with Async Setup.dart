/*
CH17 - 03
Splash Screen with Async Setup

GOAL:
- Build a proper splash screen
- Perform async setup while splash is visible
- Navigate after initialization completes

CORE IDEA:

Pattern:

runApp()
   ↓
SplashScreen
   ↓
Async initialization
   ↓
Navigate to Home or Login

This avoids:
- Blocking main()
- Blank white screen
- Flicker

This is the most common production pattern.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: SplashScreen(),
    );
  }
}

class SplashScreen extends StatefulWidget {
  const SplashScreen({super.key});

  @override
  State<SplashScreen> createState() => _SplashScreenState();
}

class _SplashScreenState extends State<SplashScreen> {
  @override
  void initState() {
    super.initState();
    _initialize();
  }

  Future<void> _initialize() async {
    debugPrint("Splash: starting initialization");

    await Future.delayed(const Duration(seconds: 2));

    final bool isLoggedIn =
        DateTime.now().second % 2 == 0; // simulate auth check

    debugPrint("Splash: initialization finished");

    if (!mounted) return;

    Navigator.pushReplacement(
      context,
      MaterialPageRoute(
        builder: (_) => isLoggedIn ? const HomePage() : const LoginPage(),
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return const Scaffold(body: Center(child: CircularProgressIndicator()));
  }
}

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    return const Scaffold(
      body: Center(child: Text("Home Page", style: TextStyle(fontSize: 24))),
    );
  }
}

class LoginPage extends StatelessWidget {
  const LoginPage({super.key});

  @override
  Widget build(BuildContext context) {
    return const Scaffold(
      body: Center(child: Text("Login Page", style: TextStyle(fontSize: 24))),
    );
  }
}

/*
Why this pattern works:

- Splash renders immediately.
- Async setup runs in background.
- UI remains responsive.
- After completion → navigate.

Important:
Always check "mounted" before navigating
after async work.

Next:
Conditional Navigation Pattern (Auth Gate).
*/
