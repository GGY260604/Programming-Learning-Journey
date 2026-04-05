/*
CH12 - 03
Provider – What Problem It Solves

Open pubspec.yaml and add:

dependencies:
  flutter:
    sdk: flutter
  provider: ^6.1.2

GOAL:
- Understand why Provider exists
- See how it simplifies InheritedWidget usage

IMPORTANT:
Provider is NOT magic.
Provider is a wrapper around InheritedWidget.

It adds:
- Cleaner syntax
- Automatic lifecycle management
- Built-in listening mechanism

Mental Model:
InheritedWidget = low-level engine
Provider = production-ready wrapper
*/

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

void main() {
  runApp(const MyApp());
}

/*
We now use Provider instead of writing
a custom InheritedWidget manually.
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return Provider<int>(
      create: (_) => 10, // Shared value
      child: const MaterialApp(
        debugShowCheckedModeBanner: false,
        home: ProviderDemoPage(),
      ),
    );
  }
}

class ProviderDemoPage extends StatelessWidget {
  const ProviderDemoPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH12/03 – Why Provider')),
      body: const Center(child: DeepWidget()),
    );
  }
}

/*
Deep widget accessing shared data.

Notice:
- No parameters passed
- No custom of(context) method
- No updateShouldNotify
*/
class DeepWidget extends StatelessWidget {
  const DeepWidget({super.key});

  @override
  Widget build(BuildContext context) {
    final value = context.watch<int>();

    return Card(
      child: Padding(
        padding: const EdgeInsets.all(20),
        child: Text(
          'Accessed via Provider\nvalue = $value',
          textAlign: TextAlign.center,
        ),
      ),
    );
  }
}

/*
------------------------------------------
Why Provider Is Better Than Raw InheritedWidget
------------------------------------------

InheritedWidget requires:
- Manual subclass
- Manual static of() method
- Manual updateShouldNotify
- Manual rebuild management

Provider gives:
- context.watch<T>() for listening which rebuilds on change
- context.read<T>() for non-listening access which does not 
  rebuild on change (onPress handlers, etc.)
- Automatic dependency tracking
- Easy lifecycle handling

Next:
We introduce ChangeNotifier —
the real engine for mutable scalable state.
*/
