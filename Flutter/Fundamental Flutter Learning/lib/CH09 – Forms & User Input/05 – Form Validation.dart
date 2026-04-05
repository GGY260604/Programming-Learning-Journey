/*
CH09 - 05
Form Validation

GOAL:
- Learn validator on TextFormField
- Understand FormState.validate()
- Show error messages automatically
- Build correct "submit" pattern

IMPORTANT:
validator returns:
- null  -> valid
- String -> error message (invalid)
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
      home: ValidationDemoPage(),
    );
  }
}

class ValidationDemoPage extends StatefulWidget {
  const ValidationDemoPage({super.key});

  @override
  State<ValidationDemoPage> createState() => _ValidationDemoPageState();
}

class _ValidationDemoPageState extends State<ValidationDemoPage> {
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();

  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();

  String message = 'Fill the form and press Submit';

  @override
  void dispose() {
    _emailController.dispose();
    _passwordController.dispose();
    super.dispose();
  }

  /*
  Simple helper to validate email format.
  This is NOT perfect email validation,
  but good enough for beginner learning.
  */
  bool _looksLikeEmail(String value) {
    return value.contains('@') && value.contains('.');
  }

  void _submit() {
    /*
    validate():
    - Calls every TextFormField.validator
    - If ALL return null -> returns true
    - If ANY returns error string -> returns false
    */
    final isValid = _formKey.currentState?.validate() ?? false;

    if (!isValid) {
      setState(() {
        message = '❌ Form invalid. Please fix errors.';
      });
      return;
    }

    /*
    If valid:
    We can safely read controllers.
    */
    setState(() {
      message = '✅ Success!\nEmail: ${_emailController.text}';
    });

    debugPrint('Email: ${_emailController.text}');
    debugPrint('Password: ${_passwordController.text}');
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH09/05 – Form Validation')),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Form(
          key: _formKey,
          child: Column(
            children: [
              /*
              =================================================
              Email Field
              =================================================
              */
              TextFormField(
                controller: _emailController,
                keyboardType: TextInputType.emailAddress,
                decoration: const InputDecoration(
                  labelText: 'Email',
                  hintText: 'example@email.com',
                  border: OutlineInputBorder(),
                ),

                /*
                validator runs when we call validate().
                */
                validator: (value) {
                  /*
                  value might be null.
                  We treat null as empty string.
                  */
                  final text = (value ?? '').trim();

                  if (text.isEmpty) {
                    return 'Email is required';
                  }

                  if (!_looksLikeEmail(text)) {
                    return 'Enter a valid email format';
                  }

                  /*
                  Return null means "valid".
                  */
                  return null;
                },
              ),

              const SizedBox(height: 20),

              /*
              =================================================
              Password Field
              =================================================
              */
              TextFormField(
                controller: _passwordController,
                obscureText: true,
                decoration: const InputDecoration(
                  labelText: 'Password',
                  border: OutlineInputBorder(),
                ),
                validator: (value) {
                  final text = (value ?? '');

                  if (text.isEmpty) {
                    return 'Password is required';
                  }

                  if (text.length < 6) {
                    return 'Password must be at least 6 characters';
                  }

                  return null;
                },
              ),

              const SizedBox(height: 30),

              ElevatedButton(onPressed: _submit, child: const Text('Submit')),

              const SizedBox(height: 20),

              Text(
                message,
                textAlign: TextAlign.center,
                style: const TextStyle(fontSize: 16),
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
🧠 HOW VALIDATION WORKS
------------------------------------------------

1) You define validator: on each TextFormField
2) You call _formKey.currentState!.validate()

validate() calls every validator:
- If validator returns String -> field shows error text
- If validator returns null -> field is valid

------------------------------------------------
🧠 WHY ERROR TEXT APPEARS AUTOMATICALLY
------------------------------------------------

TextFormField integrates with Form.
Form stores validation state.
So it can show errors under the field.

------------------------------------------------
🧠 SUBMIT PATTERN (STANDARD)
------------------------------------------------

onPressed:
  if (!form.validate()) return;
  // read values
  // continue logic

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

validator:
- returns null => OK
- returns String => show error
*/
