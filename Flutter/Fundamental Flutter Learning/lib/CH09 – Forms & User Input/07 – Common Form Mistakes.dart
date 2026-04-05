/*
CH09 - 07
Common Form Mistakes

GOAL:
- Learn common mistakes with TextField/TextFormField
- Learn correct patterns
- Avoid memory leaks and confusing bugs

IMPORTANT:
Forms combine:
- UI
- state
- controllers
- validation
So small mistakes can cause confusing behavior.
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
      home: CommonMistakesPage(),
    );
  }
}

class CommonMistakesPage extends StatefulWidget {
  const CommonMistakesPage({super.key});

  @override
  State<CommonMistakesPage> createState() => _CommonMistakesPageState();
}

class _CommonMistakesPageState extends State<CommonMistakesPage> {
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();

  final TextEditingController _nameController = TextEditingController();
  final TextEditingController _ageController = TextEditingController();

  String info = 'Fill in the form, then press Submit';

  @override
  void dispose() {
    /*
    ✅ GOOD PRACTICE:
    Always dispose controllers to avoid memory leaks.
    */
    _nameController.dispose();
    _ageController.dispose();
    super.dispose();
  }

  void _submit() {
    /*
    ✅ Standard submit pattern:
    Validate first, then read values.
    */
    final ok = _formKey.currentState?.validate() ?? false;

    if (!ok) {
      setState(() {
        info = '❌ Invalid: fix errors below';
      });
      return;
    }

    /*
    If valid, read controller values.
    */
    setState(() {
      info = '✅ Hello ${_nameController.text}, age ${_ageController.text}';
    });

    /*
    Hide keyboard after submit (good UX)
    */
    FocusScope.of(context).unfocus();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('CH09/07 – Common Form Mistakes')),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Form(
          key: _formKey,
          child: Column(
            children: [
              /*
              =================================================
              Name field
              =================================================
              */
              TextFormField(
                controller: _nameController,
                decoration: const InputDecoration(
                  labelText: 'Name',
                  border: OutlineInputBorder(),
                ),

                /*
                ✅ validator returns:
                null => valid
                String => error message
                */
                validator: (value) {
                  final text = (value ?? '').trim();
                  if (text.isEmpty) return 'Name is required';
                  if (text.length < 2) return 'Name too short';
                  return null;
                },
              ),

              const SizedBox(height: 20),

              /*
              =================================================
              Age field
              =================================================
              */
              TextFormField(
                controller: _ageController,
                keyboardType: TextInputType.number,
                decoration: const InputDecoration(
                  labelText: 'Age',
                  border: OutlineInputBorder(),
                ),
                validator: (value) {
                  final text = (value ?? '').trim();
                  if (text.isEmpty) return 'Age is required';

                  /*
                  ✅ Use tryParse to avoid crash.
                  */
                  final age = int.tryParse(text);
                  if (age == null) return 'Age must be a number';
                  if (age < 0) return 'Age cannot be negative';
                  return null;
                },
              ),

              const SizedBox(height: 30),

              ElevatedButton(onPressed: _submit, child: const Text('Submit')),

              const SizedBox(height: 20),

              Text(info, textAlign: TextAlign.center),
            ],
          ),
        ),
      ),
    );
  }
}

/*
------------------------------------------------
⚠️ COMMON FORM MISTAKES (EXPLAINED)
------------------------------------------------

❌ 1) Forgetting dispose() for controllers
- Controllers hold resources/listeners
- Not disposing can cause memory leaks

✅ Fix:
Dispose controllers in dispose()

------------------------------------------------

❌ 2) Reading controller values BEFORE validation
- You might process invalid input

✅ Fix:
validate() first
then read controller text

------------------------------------------------

❌ 3) Crashing by using int.parse on bad input

WRONG:
int.parse("abc") -> throws exception

✅ Fix:
int.tryParse("abc") -> returns null safely

------------------------------------------------

❌ 4) Calling validate() but validator returns wrong values

Remember:
validator:
- return null => valid
- return String => invalid

If you return "" (empty string),
it still counts as an error message.

------------------------------------------------

❌ 5) Putting heavy logic inside build()
build() can run many times.
Heavy work inside build() causes lag.

✅ Fix:
Put logic inside:
- onPressed
- methods like _submit()
- initState (advanced)

------------------------------------------------

❌ 6) Confusing TextField with TextFormField
TextField:
- no built-in validator

TextFormField:
- integrates with Form + validator

✅ Use TextFormField for forms.

------------------------------------------------
🎯 FINAL MENTAL MODEL
------------------------------------------------

Form = structure + validation manager
TextFormField = field with validator
Controller = read/control text
validate() first, then process
*/
