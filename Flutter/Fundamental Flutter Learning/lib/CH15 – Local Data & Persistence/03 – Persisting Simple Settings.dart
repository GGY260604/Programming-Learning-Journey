/*
CH15 - 03
Persisting Simple Settings (Theme Preference Example)

GOAL:
- Persist a boolean setting
- Restore setting on app startup
- Connect local storage to app-level behavior

CORE IDEA:

Common real-world use case:
User toggles Dark Mode preference.

Flow:
1) Read saved preference from disk at startup
2) Apply it to MaterialApp (themeMode)
3) When user toggles → save to disk

This demonstrates:
Persistent state controlling app architecture.
*/

import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';

void main() {
  runApp(const ThemePreferenceApp());
}

class ThemePreferenceApp extends StatefulWidget {
  const ThemePreferenceApp({super.key});

  @override
  State<ThemePreferenceApp> createState() => _ThemePreferenceAppState();
}

class _ThemePreferenceAppState extends State<ThemePreferenceApp> {
  static const String keyDarkMode = "dark_mode";

  ThemeMode mode = ThemeMode.system;
  bool isLoading = true;

  @override
  void initState() {
    super.initState();
    _loadPreference();
  }

  Future<void> _loadPreference() async {
    await Future.delayed(const Duration(seconds: 2)); // simulate delay
    final prefs = await SharedPreferences.getInstance();
    final isDark = prefs.getBool(keyDarkMode);

    debugPrint("Loaded dark mode preference: $isDark");

    setState(() {
      if (isDark == null) {
        mode = ThemeMode.system;
      } else {
        mode = isDark ? ThemeMode.dark : ThemeMode.light;
      }
      isLoading = false;
    });
  }

  Future<void> _savePreference(bool isDark) async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setBool(keyDarkMode, isDark);

    debugPrint("Saved dark mode preference: $isDark");
  }

  void _toggleTheme() {
    final newMode = mode == ThemeMode.dark ? ThemeMode.light : ThemeMode.dark;

    setState(() {
      mode = newMode;
    });

    _savePreference(newMode == ThemeMode.dark);
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
      theme: ThemeData.light(useMaterial3: true),
      darkTheme: ThemeData.dark(useMaterial3: true),
      themeMode: mode,
      home: HomePage(onToggle: _toggleTheme),
    );
  }
}

class HomePage extends StatelessWidget {
  final VoidCallback onToggle;

  const HomePage({super.key, required this.onToggle});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("CH15/03 – Persist Settings")),
      body: Center(
        child: ElevatedButton(
          onPressed: onToggle,
          child: const Text("Toggle Dark Mode"),
        ),
      ),
    );
  }
}

/*
Mental Upgrade:

You now connected:

Persistent Storage
→ App Initialization
→ Global Architecture (themeMode)

This is how real apps:
- Remember login
- Remember theme
- Remember onboarding

Next:
Storing tokens & login state pattern.
*/
