/*
CH12 - 08
Multiple Providers (App-Level State)

GOAL:
- Learn how to provide multiple state objects
- Simulate "app-level state" (e.g., user + settings)
- Show that pages/widgets can read different providers cleanly

IMPORTANT:
MultiProvider lets you register multiple providers at the app root.

Mental Model:
App root = dependency container
Each provider = a state module
Widgets read only what they need
*/

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(const MyApp());
}

/*
State Module 1: Counter
*/
class CounterModel extends ChangeNotifier {
  int _count = 0;
  int get count => _count;

  void increment() {
    _count++;
    notifyListeners();
  }
}

/*
State Module 2: Theme Setting (just a boolean)
*/
class SettingsModel extends ChangeNotifier {
  bool _darkMode = false;
  bool get darkMode => _darkMode;

  void toggleDarkMode() {
    _darkMode = !_darkMode;
    notifyListeners();
  }
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MultiProvider(
      providers: [
        ChangeNotifierProvider(create: (_) => CounterModel()),
        ChangeNotifierProvider(create: (_) => SettingsModel()),
      ],
      child: const AppRoot(),
    );
  }
}

/*
We separate AppRoot so it can watch settings for theme switching.
*/
class AppRoot extends StatelessWidget {
  const AppRoot({super.key});

  @override
  Widget build(BuildContext context) {
    final darkMode = context.watch<SettingsModel>().darkMode;

    return MaterialApp(
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        useMaterial3: true,
        brightness: darkMode ? Brightness.dark : Brightness.light,
      ),
      home: const MultiProviderDemoPage(),
    );
  }
}

class MultiProviderDemoPage extends StatelessWidget {
  const MultiProviderDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    debugPrint("MultiProviderDemoPage rebuild");

    return Scaffold(
      appBar: AppBar(title: const Text('CH12/08 – MultiProvider')),
      body: const Center(child: DashboardCard()),
    );
  }
}

class DashboardCard extends StatelessWidget {
  const DashboardCard({super.key});

  @override
  Widget build(BuildContext context) {
    return Card(
      child: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            /*
            Read CounterModel
            */
            Consumer<CounterModel>(
              builder: (context, counter, child) {
                return Text(
                  'Counter = ${counter.count}',
                  style: const TextStyle(
                    fontSize: 22,
                    fontWeight: FontWeight.bold,
                  ),
                );
              },
            ),

            const SizedBox(height: 20),

            ElevatedButton(
              onPressed: () => context.read<CounterModel>().increment(),
              child: const Text('Increment Counter'),
            ),

            const SizedBox(height: 20),
            const Divider(),
            const SizedBox(height: 10),

            /*
            Read SettingsModel
            */
            Consumer<SettingsModel>(
              builder: (context, settings, child) {
                return Text(
                  'Dark Mode = ${settings.darkMode}',
                  style: const TextStyle(fontSize: 16),
                );
              },
            ),

            const SizedBox(height: 10),

            ElevatedButton(
              onPressed: () => context.read<SettingsModel>().toggleDarkMode(),
              child: const Text('Toggle Dark Mode'),
            ),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------
Key Takeaways
------------------------------------------

1) MultiProvider registers multiple state modules at root.
2) Widgets can read ONLY what they need.
3) App-level things (theme, auth, locale) usually live here.

Next:
We learn "Derived State" (computed values) to avoid storing duplicates.
*/
