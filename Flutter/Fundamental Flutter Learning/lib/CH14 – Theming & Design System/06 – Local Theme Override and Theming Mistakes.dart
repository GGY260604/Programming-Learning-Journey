/*
CH14 - 06
Local Theme Override and Theming Mistakes

GOAL:
- Learn how to override theme locally (for one widget subtree)
- Understand when local override is appropriate
- Identify common theming mistakes

IMPORTANT:
Theme is inherited.
You can override it for a subtree using Theme(...).

Mental Model:
Global theme = app-wide design system
Local override = special case (component / section)
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class AppTheme {
  static ThemeData lightTheme = ThemeData(
    useMaterial3: true,
    colorScheme: ColorScheme.fromSeed(
      seedColor: Colors.indigo,
      brightness: Brightness.light,
    ),
  );
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      theme: AppTheme.lightTheme,
      home: const LocalOverridePage(),
    );
  }
}

class LocalOverridePage extends StatelessWidget {
  const LocalOverridePage({super.key});

  @override
  Widget build(BuildContext context) {
    final globalScheme = Theme.of(context).colorScheme;

    return Scaffold(
      appBar: AppBar(title: const Text("CH14/06 – Local Override")),
      body: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          children: [
            /*
            Global theme area
            */
            _DemoCard(
              title: "Global Theme",
              background: globalScheme.primary,
              foreground: globalScheme.onPrimary,
              buttonLabel: "Global Button",
              onPressed: () => debugPrint("Global button pressed"),
            ),

            const SizedBox(height: 20),
            const Divider(),
            const SizedBox(height: 20),

            /*
            Local theme override area
            */
            Theme(
              data: Theme.of(context).copyWith(
                colorScheme: ColorScheme.fromSeed(
                  seedColor: Colors.teal,
                  brightness: Brightness.light,
                ),
              ),
              child: Builder(
                /*
                Builder creates a new context under the Theme override.
                So Theme.of(context) inside this Builder reads the local theme.
                */
                builder: (context) {
                  final localScheme = Theme.of(context).colorScheme;

                  return _DemoCard(
                    title: "Local Override Theme",
                    background: localScheme.primary,
                    foreground: localScheme.onPrimary,
                    buttonLabel: "Local Button",
                    onPressed: () => debugPrint("Local button pressed"),
                  );
                },
              ),
            ),

            const SizedBox(height: 20),
            const Divider(),
            const SizedBox(height: 12),

            const Text(
              "Common Theming Mistakes",
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 8),
            const Text(
              "1) Hardcoding Colors.white / Colors.black\n"
              "2) Mixing random TextStyle sizes everywhere\n"
              "3) Overriding theme too often (causes inconsistency)\n"
              "4) Not using ColorScheme roles (primary/onPrimary/surface)\n",
              style: TextStyle(fontSize: 13, height: 1.35),
            ),
          ],
        ),
      ),
    );
  }
}

class _DemoCard extends StatelessWidget {
  final String title;
  final Color background;
  final Color foreground;
  final String buttonLabel;
  final VoidCallback onPressed;

  const _DemoCard({
    required this.title,
    required this.background,
    required this.foreground,
    required this.buttonLabel,
    required this.onPressed,
  });

  @override
  Widget build(BuildContext context) {
    return Card(
      child: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          children: [
            Container(
              width: double.infinity,
              padding: const EdgeInsets.all(14),
              color: background,
              child: Text(
                title,
                style: TextStyle(
                  color: foreground,
                  fontWeight: FontWeight.bold,
                ),
              ),
            ),
            const SizedBox(height: 12),
            ElevatedButton(onPressed: onPressed, child: Text(buttonLabel)),
          ],
        ),
      ),
    );
  }
}

/*
CH14 completed ✅

You now know:
- ThemeData purpose
- ColorScheme roles (Material 3)
- TextTheme discipline
- Centralized AppTheme
- Dark mode switching
- Local override patterns + mistakes
*/
