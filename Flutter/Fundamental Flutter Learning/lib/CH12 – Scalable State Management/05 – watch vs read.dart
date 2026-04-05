/*
CH12 - 05
context.watch() vs context.read()

GOAL:
- Understand the difference between watch and read
- See which one rebuilds UI
- Learn how to avoid unnecessary rebuilds

IMPORTANT:

context.watch<T>()
→ Subscribes to changes
→ Rebuilds when notifyListeners() is called

context.read<T>()
→ Does NOT subscribe
→ Used for calling methods (events)

Mental Model:
watch = listening
read  = interacting
*/

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(const MyApp());
}

class CounterModel extends ChangeNotifier {
  int _count = 0;
  int get count => _count;

  void increment() {
    _count++;
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
        home: WatchReadDemoPage(),
      ),
    );
  }
}

class WatchReadDemoPage extends StatelessWidget {
  const WatchReadDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    debugPrint("WatchReadDemoPage rebuild");

    // This widget listens
    final model = context.watch<CounterModel>();

    return Scaffold(
      appBar: AppBar(title: const Text('CH12/05 – watch vs read')),
      body: Center(
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            const ListeningWidget(),
            const SizedBox(height: 20),

            Text(
              'Parent sees count = ${model.count}',
              style: const TextStyle(fontSize: 16),
            ),

            const SizedBox(height: 20),

            /*
            This button uses read()
            It will NOT rebuild when state changes.
            */
            const ButtonWidget(),
          ],
        ),
      ),
    );
  }
}

/*
This widget uses watch().
It rebuilds whenever notifyListeners() is called.
*/
class ListeningWidget extends StatelessWidget {
  const ListeningWidget({super.key});

  @override
  Widget build(BuildContext context) {
    debugPrint("ListeningWidget rebuild");

    final count = context.watch<CounterModel>().count;

    return Text(
      'ListeningWidget count = $count',
      style: const TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
    );
  }
}

class ButtonWidget extends StatelessWidget {
  const ButtonWidget({super.key});

  @override
  Widget build(BuildContext context) {
    debugPrint("ButtonWidget rebuild");

    return ElevatedButton(
      onPressed: () {
        context.read<CounterModel>().increment();
      },
      child: const Text('Increment'),
    );
  }
}

/*
------------------------------------------
Observe in console:

- Press button
- Only widgets using watch() rebuild
- read() does not cause rebuild

Key Rule:

Use watch() → when UI depends on state
Use read()  → inside event handlers

Next:
We refine rebuild control using Consumer and rebuild boundaries.
*/
