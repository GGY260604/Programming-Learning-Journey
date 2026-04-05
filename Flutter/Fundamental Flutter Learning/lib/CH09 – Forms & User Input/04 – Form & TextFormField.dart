/*
CH09 - 04
Form & TextFormField

GOAL:
- Understand Form widget
- Understand GlobalKey<FormState>
- Learn how to submit a form
- Prepare for validation

IMPORTANT:
Form manages multiple input fields together.
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
      home: FormDemoPage(),
    );
  }
}

/*
================================================
FORM DEMO PAGE
================================================
*/
class FormDemoPage extends StatefulWidget {
  const FormDemoPage({super.key});

  @override
  State<FormDemoPage> createState() => _FormDemoPageState();
}

class _FormDemoPageState extends State<FormDemoPage> {
  /*
  GlobalKey allows us to access FormState.
  */
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();

  final TextEditingController _usernameController = TextEditingController();

  final TextEditingController _passwordController = TextEditingController();

  @override
  void dispose() {
    _usernameController.dispose();
    _passwordController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH09/04 – Form')),
      body: Padding(
        padding: const EdgeInsets.all(16),

        /*
        Form groups input fields.
        */
        child: Form(
          key: _formKey,

          child: Column(
            children: [
              /*
              TextFormField is used inside Form.
              */
              TextFormField(
                controller: _usernameController,
                decoration: const InputDecoration(
                  labelText: 'Username',
                  border: OutlineInputBorder(),
                ),
              ),

              const SizedBox(height: 20),

              TextFormField(
                controller: _passwordController,
                obscureText: true,
                decoration: const InputDecoration(
                  labelText: 'Password',
                  border: OutlineInputBorder(),
                ),
              ),

              const SizedBox(height: 30),

              ElevatedButton(
                onPressed: () {
                  /*
                  Access FormState using key.
                  */
                  if (_formKey.currentState != null) {
                    /*
                    For now we just print values.
                    Validation will come next.
                    */
                    debugPrint('Username: ${_usernameController.text}');

                    debugPrint('Password: ${_passwordController.text}');
                  }
                },
                child: const Text('Submit'),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

/*
------------------------------------------------
🧠 WHAT IS Form?
------------------------------------------------

Form:
- Container for multiple input fields
- Provides validation & save methods
- Accessed using GlobalKey<FormState>

------------------------------------------------
🧠 WHAT IS GlobalKey<FormState>?
------------------------------------------------

It allows us to:

_formKey.currentState

Access FormState methods like:
- validate()
- save()
- reset()

------------------------------------------------
🧠 TextField vs TextFormField
------------------------------------------------

TextField:
- Standalone input

TextFormField:
- Works inside Form
- Supports validator
- Integrates with FormState

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Form:
Manager of input fields

TextFormField:
Input that integrates with Form
*/
