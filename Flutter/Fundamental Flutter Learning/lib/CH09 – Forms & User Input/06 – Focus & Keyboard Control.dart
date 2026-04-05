/*
CH09 - 06
Focus & Keyboard Control

GOAL:
- Understand FocusNode
- Move focus between fields
- Control keyboard action button
- Dismiss keyboard programmatically

IMPORTANT:
Good UX includes proper keyboard control.
*/

import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

/*
App root
*/
class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: FocusDemoPage(),
    );
  }
}

class FocusDemoPage extends StatefulWidget {
  const FocusDemoPage({super.key});

  @override
  State<FocusDemoPage> createState() => _FocusDemoPageState();
}

class _FocusDemoPageState extends State<FocusDemoPage> {
  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();

  /*
  FocusNodes allow manual focus control.
  */
  final FocusNode _emailFocus = FocusNode();
  final FocusNode _passwordFocus = FocusNode();

  @override
  void dispose() {
    _emailController.dispose();
    _passwordController.dispose();
    _emailFocus.dispose();
    _passwordFocus.dispose();
    super.dispose();
  }

  void _submit() {
    /*
    Hide keyboard when submitting.
    */
    FocusScope.of(context).unfocus();

    debugPrint('Email: ${_emailController.text}');
    debugPrint('Password: ${_passwordController.text}');
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH09/06 – Focus & Keyboard')),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          children: [
            /*
            =================================================
            Email Field
            =================================================
            */
            TextField(
              controller: _emailController,
              focusNode: _emailFocus,

              /*
              Keyboard shows "Next"
              */
              textInputAction: TextInputAction.next,

              // When "Next" is pressed
              onSubmitted: (_) {
                /*
                Move focus to password field
                when user presses "Next".
                */
                FocusScope.of(context).requestFocus(_passwordFocus);
              },

              decoration: const InputDecoration(
                labelText: 'Email',
                border: OutlineInputBorder(),
              ),
            ),

            const SizedBox(height: 20),

            /*
            =================================================
            Password Field
            =================================================
            */
            TextField(
              controller: _passwordController,
              focusNode: _passwordFocus,
              obscureText: true,

              /*
              Keyboard shows "Done"
              */
              textInputAction: TextInputAction.done,

              // When "Done" is pressed
              onSubmitted: (_) {
                /*
                When user presses "Done",
                submit form.
                */
                _submit();
              },

              decoration: const InputDecoration(
                labelText: 'Password',
                border: OutlineInputBorder(),
              ),
            ),

            const SizedBox(height: 30),

            ElevatedButton(onPressed: _submit, child: const Text('Submit')),
          ],
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS FocusNode?
------------------------------------------------

FocusNode:
- Controls focus state of a TextField
- Allows manual focus switching

------------------------------------------------
🧠 textInputAction
------------------------------------------------

Controls keyboard action button:

next
done
search
send

------------------------------------------------
🧠 onSubmitted
------------------------------------------------

Triggered when user presses keyboard action button.

------------------------------------------------
🧠 HIDE KEYBOARD
------------------------------------------------

FocusScope.of(context).unfocus();

Removes focus from all fields.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

FocusNode = focus controller
textInputAction = keyboard button type
onSubmitted = keyboard button behavior
*/
