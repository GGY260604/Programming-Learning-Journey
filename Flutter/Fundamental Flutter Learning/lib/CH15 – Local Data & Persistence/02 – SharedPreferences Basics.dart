/*
CH15 - 02
SharedPreferences Basics

Add Dependency

In pubspec.yaml:

dependencies:
  flutter:
    sdk: flutter
  shared_preferences: ^2.2.3

GOAL:
- Save simple key-value data on device (persistent)
- Load it when app starts
- Understand: async read/write

CORE IDEA:
SharedPreferences is for small data:
- bool, int, double, String, List<String>

Typical use:
- theme preference
- onboarding completed
- simple settings
- "remember me" flag

This file:
- saves an int counter to disk
- loads it on startup
*/

import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';

void main() {
  runApp(
    const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: SharedPrefsCounterPage(),
    ),
  );
}

class SharedPrefsCounterPage extends StatefulWidget {
  const SharedPrefsCounterPage({super.key});

  @override
  State<SharedPrefsCounterPage> createState() => _SharedPrefsCounterPageState();
}

class _SharedPrefsCounterPageState extends State<SharedPrefsCounterPage> {
  static const String keyCounter = "counter";

  int counter = 0;
  bool isLoading = true;

  /*
  Load persistent state when page starts.
  */
  @override
  void initState() {
    super.initState();
    _loadCounter();
  }

  Future<void> _loadCounter() async {
    await Future.delayed(const Duration(seconds: 2)); // simulate delay
    final prefs = await SharedPreferences.getInstance();
    final saved = prefs.getInt(keyCounter) ?? 0;

    debugPrint("Loaded counter from disk: $saved");

    setState(() {
      counter = saved;
      isLoading = false;
    });
  }

  Future<void> _saveCounter() async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setInt(keyCounter, counter);

    debugPrint("Saved counter to disk: $counter");
  }

  Future<void> _increment() async {
    setState(() {
      counter++;
    });

    // Persist after change
    await _saveCounter();
  }

  Future<void> _reset() async {
    setState(() {
      counter = 0;
    });

    await _saveCounter();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("CH15/02 – SharedPreferences")),
      body: Center(
        child: isLoading
            ? const CircularProgressIndicator()
            : Column(
                mainAxisSize: MainAxisSize.min,
                children: [
                  Text(
                    "Counter: $counter",
                    style: const TextStyle(
                      fontSize: 28,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                  const SizedBox(height: 20),
                  ElevatedButton(
                    onPressed: _increment,
                    child: const Text("Increase + Save"),
                  ),
                  const SizedBox(height: 10),
                  ElevatedButton(
                    onPressed: _reset,
                    child: const Text("Reset + Save"),
                  ),
                ],
              ),
      ),
    );
  }
}

/*
Mental Model:

- SharedPreferences is persistent (disk).
- Reading/writing is async.
- You typically:
  initState -> load -> setState

Try:
1) Tap Increase a few times
2) Hot restart / close app
3) Counter should remain

Next:
Persisting real settings (theme preference pattern).
*/
