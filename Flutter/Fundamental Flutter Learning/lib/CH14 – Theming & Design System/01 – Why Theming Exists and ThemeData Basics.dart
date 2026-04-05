/*
CH14 - 01
Why Theming Exists and ThemeData Basics

GOAL:
- Understand why theming exists (avoid hardcoded styles everywhere)
- Learn ThemeData as the app-wide styling source
- Learn Theme.of(context) as "read the design system"

IMPORTANT:
Bad:
TextStyle(fontSize: 18, color: Colors.blue) everywhere
→ inconsistent UI
→ hard to change later

Good:
Define theme once (ThemeData)
Use Theme.of(context) inside widgets
→ consistent, scalable UI

Mental Model:
ThemeData = global design system
Theme.of(context) = read the current design system
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
App theme lives at MaterialApp level.
Everything under it can read Theme.of(context).
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,

      /*
      ThemeData = app-wide styling configuration
      */
      theme: ThemeData(
        useMaterial3: true, // enable Material 3 styles, default is false
        /*
        These are just examples.
        We'll become more systematic in CH14-02 onwards.
        */
        primaryColor: Colors.blue,

        // affects ElevatedButton default style, AppBar, etc.
        elevatedButtonTheme: ElevatedButtonThemeData(
          style: ElevatedButton.styleFrom(
            padding: const EdgeInsets.symmetric(horizontal: 18, vertical: 12),
          ),
        ),
      ),

      home: const ThemeBasicsPage(),
    );
  }
}

class ThemeBasicsPage extends StatelessWidget {
  const ThemeBasicsPage({super.key});

  @override
  Widget build(BuildContext context) {
    /*
    Reading theme:
    Theme.of(context) returns ThemeData
    */
    final theme = Theme.of(context);

    return Scaffold(
      appBar: AppBar(title: const Text('CH14/01 – Theme Basics')),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const Text(
              'Two ways to style:',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 12),

            /*
            A) Hardcoded styling (not scalable)
            */
            const Text(
              'A) Hardcoded Style (not scalable)',
              style: TextStyle(
                fontSize: 18,
                color: Colors.blue,
                fontWeight: FontWeight.bold,
              ),
            ),
            const SizedBox(height: 6),
            const Text(
              'If you change your app color later,\n'
              'you must edit many files.',
              style: TextStyle(fontSize: 13),
            ),

            const SizedBox(height: 20),
            const Divider(),
            const SizedBox(height: 20),

            /*
            B) Theme-based styling (scalable)
            */
            Text(
              'B) Theme-based Style (scalable)',
              style: theme.textTheme.titleMedium?.copyWith(
                color: theme.primaryColor,
                fontWeight: FontWeight.bold,
              ),
            ),
            const SizedBox(height: 6),
            const Text(
              'We read style from the theme.\n'
              'Changing theme updates the whole app.',
              style: TextStyle(fontSize: 13),
            ),

            const SizedBox(height: 20),

            Row(
              children: [
                ElevatedButton(
                  onPressed: () {
                    debugPrint("Button pressed");
                  },
                  child: const Text('Themed Button'),
                ),
                const SizedBox(width: 12),
                Text(
                  'Button padding comes from ThemeData',
                  style: theme.textTheme.bodySmall,
                ),
              ],
            ),

            const SizedBox(height: 30),

            const Text(
              'Key Idea:',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 8),
            const Text(
              'Theme helps you avoid styling chaos.\n'
              'Later files will formalize this into:\n'
              '- ColorScheme\n'
              '- TextTheme discipline\n'
              '- Dark mode\n'
              '- Local overrides\n',
              style: TextStyle(fontSize: 13, height: 1.35),
            ),
          ],
        ),
      ),
    );
  }
}

/*
Mental Model Summary:

- ThemeData is a centralized style configuration.
- Widgets below MaterialApp can read it via Theme.of(context).
- The goal is consistency + easy global changes.
*/
