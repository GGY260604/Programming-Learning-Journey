/*
CH14 - 02
ColorScheme and Material 3 System

GOAL:
- Stop using Colors.blue everywhere
- Understand semantic color roles
- Learn ColorScheme in Material 3

IMPORTANT:
ColorScheme is NOT random colors.
It defines color roles:

primary        → main brand color
onPrimary      → color placed on primary
surface        → background of cards
onSurface      → text on surface
error          → error color
onError        → text on error

Mental Model:
Don't think "blue".
Think "primary".
Don't think "white text".
Think "onPrimary".
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    /*
    Define ColorScheme first.
    Then give it to ThemeData.
    */
    final colorScheme = ColorScheme.fromSeed(
      seedColor: const Color.fromARGB(255, 133, 221, 142),
      brightness: Brightness.light,
    );

    return MaterialApp(
      debugShowCheckedModeBanner: false,
      theme: ThemeData(useMaterial3: true, colorScheme: colorScheme),
      home: const ColorSchemeDemoPage(),
    );
  }
}

class ColorSchemeDemoPage extends StatelessWidget {
  const ColorSchemeDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    final scheme = Theme.of(context).colorScheme;

    return Scaffold(
      appBar: AppBar(title: const Text("CH14/02 – ColorScheme")),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          children: [
            _ColorCard(
              label: "Primary",
              background: scheme.primary,
              foreground: scheme.onPrimary,
            ),
            const SizedBox(height: 12),
            _ColorCard(
              label: "Surface",
              background: scheme.surface,
              foreground: scheme.onSurface,
            ),
            const SizedBox(height: 12),
            _ColorCard(
              label: "Error",
              background: scheme.error,
              foreground: scheme.onError,
            ),
            const SizedBox(height: 24),

            const Divider(),
            const SizedBox(height: 12),

            const Text(
              "Why This Matters:",
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 8),
            const Text(
              "If you change the seedColor,\n"
              "your entire app recolors automatically.\n\n"
              "This is scalable design.\n"
              "Not hardcoded styling.",
              textAlign: TextAlign.center,
            ),
          ],
        ),
      ),
    );
  }
}

class _ColorCard extends StatelessWidget {
  final String label;
  final Color background;
  final Color foreground;

  const _ColorCard({
    required this.label,
    required this.background,
    required this.foreground,
  });

  @override
  Widget build(BuildContext context) {
    return Container(
      width: double.infinity,
      padding: const EdgeInsets.all(16),
      color: background,
      child: Text(
        label,
        style: TextStyle(
          color: foreground,
          fontSize: 18,
          fontWeight: FontWeight.bold,
        ),
      ),
    );
  }
}

/*
Mental Upgrade:

Wrong thinking:
"I'll use blue for buttons."

Correct thinking:
"Buttons use primary color."

Wrong thinking:
"I'll use white text."

Correct thinking:
"Text on primary uses onPrimary."

This allows:
- automatic dark mode
- accessible contrast
- consistent UI
*/
