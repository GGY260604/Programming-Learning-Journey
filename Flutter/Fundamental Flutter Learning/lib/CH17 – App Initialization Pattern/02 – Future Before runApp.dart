/*
CH17 - 02
Future Before runApp

GOAL:
- Learn how to perform async work BEFORE runApp()
- Understand WidgetsFlutterBinding.ensureInitialized()
- Move initialization out of UI layer

CORE IDEA:

Sometimes initialization must happen
before the widget tree exists.

Examples:
- Load saved theme
- Load login token
- Initialize database
- Initialize secure storage

Solution:
Make main() async.

IMPORTANT:
Call WidgetsFlutterBinding.ensureInitialized()
before using async plugins.
*/

import 'package:flutter/material.dart';

void main() async {
  /*
  Required when using async before runApp().
  It ensures Flutter engine is ready.
  */
  WidgetsFlutterBinding.ensureInitialized();

  debugPrint("App starting...");

  final bool isLoggedIn = await _fakeCheckLogin();

  debugPrint("Initialization done. Logged in: $isLoggedIn");

  runApp(MyApp(isLoggedIn: isLoggedIn));
}

/*
Simulate loading token from disk.
*/
Future<bool> _fakeCheckLogin() async {
  await Future.delayed(const Duration(seconds: 2));
  return true; // simulate saved login
}

class MyApp extends StatelessWidget {
  final bool isLoggedIn;

  const MyApp({super.key, required this.isLoggedIn});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: isLoggedIn
          ? const HomePage()
          : const LoginPage(),
    );
  }
}

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    return const Scaffold(
      body: Center(
        child: Text(
          "Home Page (Logged In)",
          style: TextStyle(fontSize: 24),
        ),
      ),
    );
  }
}

class LoginPage extends StatelessWidget {
  const LoginPage({super.key});

  @override
  Widget build(BuildContext context) {
    return const Scaffold(
      body: Center(
        child: Text(
          "Login Page (Not Logged In)",
          style: TextStyle(fontSize: 24),
        ),
      ),
    );
  }
}

/*
Mental Upgrade:

Before:
Initialization lived inside a widget (initState).

Now:
Initialization happens BEFORE runApp().

This is cleaner when:
- You must know app state before building UI
- You want no loading screen flicker

Rule:

If initialization affects app-level routing,
consider doing it before runApp().

Next:
Splash screen + async setup pattern.
*/