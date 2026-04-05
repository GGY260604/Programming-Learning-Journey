/*
CH14 - 03
TextTheme and Typography Discipline

GOAL:
- Stop hardcoding font sizes everywhere
- Understand TextTheme roles
- Build typography consistency

IMPORTANT:
Bad:
TextStyle(fontSize: 18)
TextStyle(fontSize: 20)
TextStyle(fontSize: 22)

→ Random sizes
→ Inconsistent UI
→ Hard to redesign later

Good:
Use textTheme roles:
- displayLarge
- titleLarge
- bodyMedium
- labelSmall

Mental Model:
TextTheme = typography system
Not random numbers.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        useMaterial3: true,

        /*
        Centralized typography configuration
        */
        textTheme: const TextTheme(
          displayLarge: TextStyle(
            fontSize: 32,
            fontWeight: FontWeight.bold,
          ),
          titleLarge: TextStyle(
            fontSize: 20,
            fontWeight: FontWeight.w600,
          ),
          bodyMedium: TextStyle(
            fontSize: 16,
          ),
          labelSmall: TextStyle(
            fontSize: 12,
            color: Colors.grey,
          ),
        ),
      ),
      home: const TypographyDemoPage(),
    );
  }
}

class TypographyDemoPage extends StatelessWidget {
  const TypographyDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    final textTheme = Theme.of(context).textTheme;

    return Scaffold(
      appBar: AppBar(
        title: const Text("CH14/03 – TextTheme"),
      ),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              "Display Large",
              style: textTheme.displayLarge,
            ),
            const SizedBox(height: 20),

            Text(
              "Title Large",
              style: textTheme.titleLarge,
            ),
            const SizedBox(height: 12),

            Text(
              "Body Medium: This is normal content text.",
              style: textTheme.bodyMedium,
            ),
            const SizedBox(height: 12),

            Text(
              "Label Small: Caption or hint text",
              style: textTheme.labelSmall,
            ),
            const SizedBox(height: 30),

            const Divider(),
            const SizedBox(height: 12),

            const Text(
              "Why Typography Discipline Matters:",
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 8),
            const Text(
              "If you redesign font size later,\n"
              "you change it once in ThemeData.\n\n"
              "UI stays consistent.\n"
              "Design becomes scalable.",
            ),
          ],
        ),
      ),
    );
  }
}

/*
Professional Insight:

Beginner thinking:
"I'll set fontSize manually."

Intermediate thinking:
"I'll define text roles and reuse them."

Advanced thinking:
"I'll align typography with design system (Figma)."

This is the start of design discipline.
*/