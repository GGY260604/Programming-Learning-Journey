/*
CH17 - 04
Conditional Navigation (Auth Check) - Auth Gate Pattern

GOAL:
- Build an "Auth Gate" (decides which page to show)
- Avoid manual Navigator pushReplacement for startup routing
- Keep startup decision declarative

CORE IDEA:

Instead of:
Splash -> Navigator.pushReplacement(Home/Login)

We can do:
AuthGate decides which screen to show.

Mental Model:
Routing choice can be a widget decision.

This pattern is simple, clean, testable.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(
    const MaterialApp(debugShowCheckedModeBanner: false, home: AuthGate()),
  );
}

class AuthGate extends StatefulWidget {
  const AuthGate({super.key});

  @override
  State<AuthGate> createState() => _AuthGateState();
}

class _AuthGateState extends State<AuthGate> {
  bool isLoading = true;
  bool isLoggedIn = false;

  @override
  void initState() {
    super.initState();
    _checkAuth();
  }

  Future<void> _checkAuth() async {
    debugPrint("AuthGate: checking auth...");

    await Future.delayed(const Duration(seconds: 2));

    // Simulate: token exists
    final result = true;

    if (!mounted) return;

    setState(() {
      isLoggedIn = result;
      isLoading = false;
    });

    debugPrint("AuthGate: done. isLoggedIn=$isLoggedIn");
  }

  @override
  Widget build(BuildContext context) {
    if (isLoading) {
      return const SplashView();
    }

    return isLoggedIn ? const HomePage() : const LoginPage();
  }
}

class SplashView extends StatelessWidget {
  const SplashView({super.key});

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
      body: Center(
        child: Text("Home Page (Authorized)", style: TextStyle(fontSize: 24)),
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
          "Login Page (Unauthorized)",
          style: TextStyle(fontSize: 24),
        ),
      ),
    );
  }
}

/*
Why AuthGate is nice:

- No Navigator pushReplacement needed
- No route flicker logic
- Declarative: UI = state

In real app:
_checkAuth() would load token from disk (SharedPreferences / secure storage).

Next:
Clean Bootstrap Architecture (bringing theme + auth + services together).
*/
