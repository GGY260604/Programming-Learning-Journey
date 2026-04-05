/*
CH12 - 04
ChangeNotifier Explained

GOAL:
- Understand what ChangeNotifier is
- See what notifyListeners() really means
- Learn the mental model used by Provider state

IMPORTANT:
ChangeNotifier is just:
- a class that holds data (state)
- a list of listeners
- notifyListeners() tells listeners: "state changed"

Mental Model:
State is stored outside the UI.
UI listens to state.
When state changes -> notifier notifies -> listening UI rebuilds.

Provider + ChangeNotifier = the common scalable pattern.
*/

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(const MyApp());
}

/*
A minimal state container.

- Holds a counter
- Provides methods to mutate it
- Calls notifyListeners() after mutation
*/
class CounterModel extends ChangeNotifier {
  int _count = 0;

  int get count => _count;

  void increment() {
    _count++;
    notifyListeners(); // tell UI to update
  }

  void decrement() {
    _count--;
    notifyListeners();
  }
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (_) => CounterModel(),
      child: const MaterialApp(
        debugShowCheckedModeBanner: false,
        home: ChangeNotifierDemoPage(),
      ),
    );
  }
}

class ChangeNotifierDemoPage extends StatelessWidget {
  const ChangeNotifierDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    // watch() = rebuild this widget when CounterModel notifies
    final model = context.watch<CounterModel>();

    return Scaffold(
      appBar: AppBar(title: const Text('CH12/04 – ChangeNotifier')),
      body: Center(
        child: Card(
          child: Padding(
            padding: const EdgeInsets.all(20),
            child: Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                const Text('UI listens to CounterModel'),
                const SizedBox(height: 12),
                Text(
                  'count = ${model.count}',
                  style: const TextStyle(
                    fontSize: 22,
                    fontWeight: FontWeight.bold,
                  ),
                ),
                const SizedBox(height: 16),

                Row(
                  mainAxisSize: MainAxisSize.min,
                  children: [
                    ElevatedButton(
                      onPressed: model.decrement,
                      child: const Text('-1'),
                    ),
                    const SizedBox(width: 12),
                    ElevatedButton(
                      onPressed: model.increment,
                      child: const Text('+1'),
                    ),
                  ],
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}

/*
------------------------------------------
Mental Model Summary
------------------------------------------

CounterModel (ChangeNotifier) stores state.
Buttons call model methods (business logic).
Methods mutate state and call notifyListeners().
Widgets using context.watch<CounterModel>() rebuild.

Next:
We will compare:
- watch vs read
- how to avoid rebuilding too much
*/
