/*
CH15 - 04
Storing Tokens and Login State (Pattern)

GOAL:
- Learn the correct pattern for saving "login state"
- Understand what should be stored vs not stored
- Demonstrate a simple token-like persistence flow

CORE IDEA:

Most apps store a token (or session flag) to remember login.

Flow:
1) On app start: read token
   - token exists → go Home
   - token missing → go Login

2) On login: save token
3) On logout: remove token

NOTE:
This file demonstrates the pattern using SharedPreferences.
For real security, later you should learn secure storage.
*/

import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';

void main() {
  runApp(const LoginStateApp());
}

class LoginStateApp extends StatefulWidget {
  const LoginStateApp({super.key});

  @override
  State<LoginStateApp> createState() => _LoginStateAppState();
}

class _LoginStateAppState extends State<LoginStateApp> {
  static const String keyToken = "auth_token";

  bool isLoading = true;
  bool isLoggedIn = false;

  @override
  void initState() {
    super.initState();
    _checkLogin();
  }

  Future<void> _checkLogin() async {
    final prefs = await SharedPreferences.getInstance();
    final token = prefs.getString(keyToken);

    debugPrint("Loaded token: $token");

    setState(() {
      isLoggedIn = token != null && token.isNotEmpty;
      isLoading = false;
    });
  }

  Future<void> _login() async {
    // Simulate successful login and received token
    const fakeToken = "token_abc123";

    final prefs = await SharedPreferences.getInstance();
    await prefs.setString(keyToken, fakeToken);

    debugPrint("Saved token: $fakeToken");

    setState(() {
      isLoggedIn = true;
    });
  }

  Future<void> _logout() async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.remove(keyToken);

    debugPrint("Token removed");

    setState(() {
      isLoggedIn = false;
    });
  }

  @override
  Widget build(BuildContext context) {
    if (isLoading) {
      return const MaterialApp(
        debugShowCheckedModeBanner: false,
        home: Scaffold(body: Center(child: CircularProgressIndicator())),
      );
    }

    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: isLoggedIn
          ? HomePage(onLogout: _logout)
          : LoginPage(onLogin: _login),
    );
  }
}

class LoginPage extends StatelessWidget {
  final VoidCallback onLogin;

  const LoginPage({super.key, required this.onLogin});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Login Page")),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            debugPrint("Login pressed");
            onLogin();
          },
          child: const Text("Login (Save Token)"),
        ),
      ),
    );
  }
}

class HomePage extends StatelessWidget {
  final VoidCallback onLogout;

  const HomePage({super.key, required this.onLogout});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Home Page")),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            debugPrint("Logout pressed");
            onLogout();
          },
          child: const Text("Logout (Remove Token)"),
        ),
      ),
    );
  }
}

/*
Rules (beginner → intermediate):

✅ Store:
- token / session id
- user preference flags

❌ Avoid storing sensitive data in plain preferences long-term.

Next:
Simple offline cache pattern (store last fetched data).
*/
