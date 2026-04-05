/*
CH14 - 05
Dark Mode Architecture

GOAL:
- Understand how lightTheme + darkTheme work
- Learn ThemeMode
- Support automatic system theme switching

IMPORTANT:

MaterialApp supports:
- theme
- darkTheme
- themeMode

themeMode options:
- ThemeMode.system  → follow device setting
- ThemeMode.light   → force light
- ThemeMode.dark    → force dark

Mental Model:
You don't "switch colors".
You switch entire ThemeData.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class AppTheme {
  static ThemeData lightTheme = ThemeData(
    useMaterial3: true,
    colorScheme: ColorScheme.fromSeed(
      seedColor: Colors.teal,
      brightness: Brightness.light,
    ),
  );

  static ThemeData darkTheme = ThemeData(
    useMaterial3: true,
    colorScheme: ColorScheme.fromSeed(
      seedColor: Colors.teal,
      brightness: Brightness.dark,
    ),
  );
}

class MyApp extends StatefulWidget {
  const MyApp({super.key});

  @override
  State<MyApp> createState() => _MyAppState();
}

/*
We use StatefulWidget here to demonstrate manual theme switching.
In real apps, this could be managed by Provider.
*/
class _MyAppState extends State<MyApp> {
  ThemeMode mode = ThemeMode.system;

  void toggleTheme() {
    setState(() {
      // Theme.system != Theme.light/dark
      if (mode == ThemeMode.light) {
        mode = ThemeMode.dark;
      } else {
        mode = ThemeMode.light;
      }
    });
    debugPrint("Theme changed: $mode");
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      theme: AppTheme.lightTheme,
      darkTheme: AppTheme.darkTheme,
      themeMode: mode,
      home: HomePage(onToggle: toggleTheme),
    );
  }
}

class HomePage extends StatelessWidget {
  final VoidCallback onToggle;

  const HomePage({super.key, required this.onToggle});

  @override
  Widget build(BuildContext context) {
    final scheme = Theme.of(context).colorScheme;

    return Scaffold(
      appBar: AppBar(title: const Text("CH14/05 – Dark Mode")),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          children: [
            Container(
              width: double.infinity,
              padding: const EdgeInsets.all(16),
              color: scheme.primary,
              child: Text(
                "Primary Background",
                style: TextStyle(
                  color: scheme.onPrimary,
                  fontWeight: FontWeight.bold,
                ),
              ),
            ),
            const SizedBox(height: 20),

            ElevatedButton(
              onPressed: onToggle,
              child: const Text("Toggle Light / Dark"),
            ),

            const SizedBox(height: 20),

            const Text(
              "If themeMode = system,\n"
              "Flutter follows device setting.\n\n"
              "Proper dark mode requires:\n"
              "- ColorScheme usage\n"
              "- Avoid hardcoded colors\n",
              textAlign: TextAlign.center,
            ),
          ],
        ),
      ),
    );
  }
}

/*
Professional Insight:

Dark mode works automatically when:
- You use ColorScheme roles
- You avoid Colors.white / Colors.black hardcoding

Wrong:
Container(color: Colors.white)

Correct:
Container(color: Theme.of(context).colorScheme.surface)

Next:
Local theme override and common theming mistakes.
*/
