/*
CH12 - 02
InheritedWidget – The Real Foundation

GOAL:
- Understand how Flutter shares data down the widget tree
- See how widgets can access shared data WITHOUT prop drilling

IMPORTANT:
InheritedWidget allows data to be accessed by descendants
using context — without passing parameters manually.

Mental Model:
InheritedWidget = tree-based dependency injection.

Instead of:
Parent → child → child → child (passing parameters)

We do:
Parent provides data once
Descendants read it via context
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
We wrap the whole app with our custom InheritedWidget.
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return CounterProvider(
      counter: 5,
      child: const MaterialApp(
        debugShowCheckedModeBanner: false,
        home: InheritedDemoPage(),
      ),
    );
  }
}

/*
------------------------------------------
Custom InheritedWidget
------------------------------------------
- Holds shared data
- Exposes static method to access it
*/
class CounterProvider extends InheritedWidget {
  final int counter;

  const CounterProvider({
    super.key,
    required this.counter,
    required super.child,
  });

  static CounterProvider of(BuildContext context) {
    // Return the nearest CounterProvider up the tree
    return context.dependOnInheritedWidgetOfExactType<CounterProvider>()!;
  }

  // Call before rebuilding dependents
  // Return true to notify dependents to rebuild if data changed
  @override
  bool updateShouldNotify(CounterProvider oldWidget) {
    return counter != oldWidget.counter;
  }
}

/*
------------------------------------------
Demo Page
------------------------------------------
No parameters passed down manually.
Widgets access shared counter via context.
*/
class InheritedDemoPage extends StatelessWidget {
  const InheritedDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH12/02 – InheritedWidget')),
      body: const Center(child: DeepChild()),
    );
  }
}

/*
------------------------------------------
Deep child
------------------------------------------
Notice:
No counter passed into constructor.
It reads directly from context.
*/
class DeepChild extends StatelessWidget {
  const DeepChild({super.key});

  @override
  Widget build(BuildContext context) {
    final provider = CounterProvider.of(context); // return the nearest CounterProvider

    return Card(
      child: Padding(
        padding: const EdgeInsets.all(20),
        child: Text(
          'Accessed from InheritedWidget\ncounter = ${provider.counter}',
          textAlign: TextAlign.center,
        ),
      ),
    );
  }
}

/*
------------------------------------------
Key Takeaways
------------------------------------------

1) InheritedWidget stores shared data in the tree.
2) Descendants access it using context.
3) No prop drilling.
4) updateShouldNotify controls rebuild behavior.

Provider (next chapter files) is:
- A cleaner wrapper around this pattern.
- Adds lifecycle + ChangeNotifier support.
*/
