/*
CH12 - 01
Why setState Does Not Scale

GOAL:
- Understand what setState really does
- See why it becomes painful when state is shared

IMPORTANT:
setState rebuilds the current StatefulWidget subtree.

It works well when:
- State is local
- Only one widget needs it

It becomes messy when:
- Multiple widgets need the same state
- Deep children need to update shared state
- You must pass values + callbacks through layers (prop drilling)

Mental Model:
setState = local state container.
Shared state requires lifting state up.
Lifting state up increases coupling.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: SetStateDemoPage(),
    );
  }
}

class SetStateDemoPage extends StatefulWidget {
  const SetStateDemoPage({super.key});

  @override
  State<SetStateDemoPage> createState() => _SetStateDemoPageState();
}

class _SetStateDemoPageState extends State<SetStateDemoPage> {
  int counter = 0;

  void increment() {
    setState(() {
      counter++;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH12/01 – setState Limitation')),
      body: Container(
        padding: const EdgeInsets.all(20),
        alignment: Alignment.topCenter,
        child: Column(
          children: [
            const Text(
              'Two widgets need the SAME counter.\n'
              'State must live in their common parent.',
            ),
            const SizedBox(height: 20),

            /*
            Both widgets read the same counter.
            */
            CounterDisplay(title: 'Widget A', value: counter),
            CounterDisplay(title: 'Widget B', value: counter),

            const SizedBox(height: 20),

            /*
            This widget updates the counter.
            It does NOT own the state.
            It depends on callback from parent.
            */
            CounterController(value: counter, onIncrement: increment),

            const SizedBox(height: 30),

            const Text(
              'Scaling Problem:\n'
              '- If Controller is 5 levels deep, callback\n'
              '  must be passed through all layers.\n'
              '- That is prop drilling.\n'
              '- Coupling increases as app grows.',
              style: TextStyle(fontSize: 13),
            ),
          ],
        ),
      ),
    );
  }
}

/*
Reads shared state
*/
class CounterDisplay extends StatelessWidget {
  final String title;
  final int value;

  const CounterDisplay({super.key, required this.title, required this.value});

  @override
  Widget build(BuildContext context) {
    return Card(
      child: Padding(
        padding: const EdgeInsets.all(16),
        child: Text('$title → counter = $value'),
      ),
    );
  }
}

/*
Updates shared state (but does not own it)
*/
class CounterController extends StatelessWidget {
  final int value;
  final VoidCallback onIncrement;

  const CounterController({
    super.key,
    required this.value,
    required this.onIncrement,
  });

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        Text('Controller sees: $value'),
        const SizedBox(height: 10),
        ElevatedButton(onPressed: onIncrement, child: const Text('Increment')),
      ],
    );
  }
}
