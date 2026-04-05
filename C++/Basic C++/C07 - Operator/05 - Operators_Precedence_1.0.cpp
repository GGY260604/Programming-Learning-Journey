/*
-------------------------------------
       C++ Operators - Precedence
-------------------------------------
Operator precedence determines the order in which
operators are evaluated in an expression.

=> Higher precedence operators are evaluated first.
=> Use parentheses () to change the default order.
*/

#include <iostream>
using namespace std;

int main() {
    int result1 = 10 + 3 * 2;       // * has higher precedence than +
    int result2 = (10 + 3) * 2;     // parentheses change the order
    int result3 = 100 / 10 * 5;     // / and * have same precedence, evaluated left-to-right
    int result4 = 10 + 6 / 2 - 3;   // / first, then + and -

    cout << "10 + 3 * 2 = " << result1 << "\n";
    cout << "(10 + 3) * 2 = " << result2 << "\n";
    cout << "100 / 10 * 5 = " << result3 << "\n";
    cout << "10 + 6 / 2 - 3 = " << result4 << "\n";

    // Demonstrate precedence with logical and comparison
    int a = 5, b = 10, c = 20;
    bool result5 = a < b && b < c;          // < evaluated before &&
    bool result6 = (a < b) && (b < c);      // same meaning, clearer

    cout << "\n(a < b && b < c) => " << result5 << "\n";
    cout << "((a < b) && (b < c)) => " << result6 << "\n";
}

/*
Output:
10 + 3 * 2 = 16
(10 + 3) * 2 = 26
100 / 10 * 5 = 50
10 + 6 / 2 - 3 = 10
(a < b && b < c) => 1
((a < b) && (b < c)) => 1

-------------------------------------
Quick Precedence Summary (High -> Low):

()       => Parentheses
* / %    => Multiplication, Division, Modulus
+ -      => Addition, Subtraction
< > <= >= => Comparison
== !=    => Equality / Inequality
&&       => Logical AND
||       => Logical OR
= += -=  => Assignment

Notes:
- Always use parentheses to make your intention clear.
- Operators with same precedence are evaluated left-to-right.
- Assignment (=, +=, etc.) are right-to-left.
-------------------------------------
*/
