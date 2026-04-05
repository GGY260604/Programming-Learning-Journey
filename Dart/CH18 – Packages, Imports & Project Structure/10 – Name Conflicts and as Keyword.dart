/*
-------------------------------------
       Import Conflicts
-------------------------------------

An import conflict happens when:
- two libraries define the SAME name
- Dart cannot decide which one to use

-------------------------------------
Example Conflict
-------------------------------------
*/

import 'dart:math';
// import 'package:math_expressions/math_expressions.dart';

/*
Both libraries define:
- pi
- sin()
- cos()

If both are imported directly,
Dart will throw a name conflict error.
*/

/*
-------------------------------------
Solution: Use 'as' (alias)
-------------------------------------
*/

// import 'package:math_expressions/math_expressions.dart' as expr;

void main() {
  // From dart:math
  print(pi);          // 3.141592653589793
  print(sin(pi / 2)); // 1.0

  // From math_expressions (namespaced)
  // expr.Expression expression = expr.Expression.parse('2 * pi');
  // double result = expression.evaluate(
  //   expr.EvaluationType.REAL,
  //   expr.ContextModel(),
  // );
  // print(result);
}

/*
-------------------------------------
Why use 'as'
-------------------------------------

Use 'as' to:
- avoid name conflicts
- clearly show where symbols come from
- improve code readability
- safely import large libraries

-------------------------------------
Key Rule
-------------------------------------

If two libraries expose the same names,
ALWAYS use `as` to namespace one of them.
*/
