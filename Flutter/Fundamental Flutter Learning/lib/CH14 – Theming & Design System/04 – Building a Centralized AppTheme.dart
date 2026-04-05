/*
CH14 - 04
Building a Centralized AppTheme

GOAL:
- Stop defining theme inside main.dart
- Extract theme into its own class
- Think in terms of "Design System Layer"

IMPORTANT:
Large apps should NOT define theme inline.

Bad:
MaterialApp(
  theme: ThemeData(... huge config ...)
)

Good:
MaterialApp(
  theme: AppTheme.lightTheme
)

Mental Model:
AppTheme = design system configuration
UI should not know how theme is constructed.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/* -------------------------
   Centralized Theme Class
--------------------------*/

class AppTheme {
  static ThemeData get lightTheme {
    final colorScheme = ColorScheme.fromSeed(
      seedColor: Colors.teal,
      brightness: Brightness.light,
    );

    return ThemeData(
      useMaterial3: true,
      colorScheme: colorScheme,

      textTheme: const TextTheme(
        titleLarge: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
        bodyMedium: TextStyle(fontSize: 16),
      ),

      elevatedButtonTheme: ElevatedButtonThemeData(
        style: ElevatedButton.styleFrom(
          padding: const EdgeInsets.symmetric(horizontal: 18, vertical: 12),
          shape: RoundedRectangleBorder(
            borderRadius: BorderRadius.circular(12),
          ),
        ),
      ),
    );
  }
}

/* -------------------------
   App Root
--------------------------*/

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      theme: AppTheme.lightTheme,
      home: const ThemeStructureDemoPage(),
    );
  }
}

/* -------------------------
   Demo Page
--------------------------*/

class ThemeStructureDemoPage extends StatelessWidget {
  const ThemeStructureDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    final scheme = Theme.of(context).colorScheme;
    final textTheme = Theme.of(context).textTheme;

    return Scaffold(
      appBar: AppBar(title: const Text("CH14/04 – AppTheme Structure")),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text("Centralized Theme Example", style: textTheme.titleLarge),
            const SizedBox(height: 12),

            Text(
              "Primary Color: ${scheme.primary}",
              style: textTheme.bodyMedium,
            ),
            const SizedBox(height: 20),

            ElevatedButton(
              onPressed: () {
                debugPrint("Using centralized theme");
              },
              child: const Text("Themed Button"),
            ),

            const SizedBox(height: 30),
            const Divider(),
            const SizedBox(height: 12),

            const Text(
              "Architecture Upgrade:",
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 8),

            const Text(
              "Theme now lives in its own layer.\n"
              "You can:\n"
              "- Add darkTheme\n"
              "- Add spacing system\n"
              "- Add custom extensions\n"
              "- Share across multiple apps\n",
            ),
          ],
        ),
      ),
    );
  }
}

/*
Design System Insight:

Small app:
Theme inside main.dart is okay.

Medium / Large app:
Extract to AppTheme class.

Production:
You may even separate:
- colors.dart
- typography.dart
- spacing.dart
- component themes.dart

This is how scalable UI systems are built.
*/
