/*
-------------------------------------
     C++ Operators - Combined Usage
-------------------------------------
This example combines arithmetic (*, +),
comparison (<, ==),
logical (&&, ||),
and assignment (=, +=) operators
to show how precedence and evaluation order affect results.
*/

#include <iostream>
using namespace std;

int main() {
    int a = 5, b = 10, c = 2;

    cout << "Initial values -> a: " << a << ", b: " << b << ", c: " << c << "\n\n";

    // 1. Arithmetic and Assignment
    a += b * c + 1;   // b*c first, then +1, then add to a
    cout << "After a += b * c + 1 => a = " << a << "\n";

    // 2. Comparison and Logical AND (&&)
    bool cond1 = (a < b + 20) && (b == 10);
    cout << "Condition 1 (a < b + 20 && b == 10): " << cond1 << "\n";

    // 3. Comparison and Logical OR (||)
    bool cond2 = (a > 20) || (c < 5);
    cout << "Condition 2 (a > 20 || c < 5): " << cond2 << "\n";

    // 4. Combine arithmetic, comparison, and logic
    bool cond3 = ((a + c * 2) < (b * 3)) && (b == 10 || c == 1);
    cout << "Condition 3 ((a + c * 2) < (b * 3)) && (b == 10 || c == 1): " << cond3 << "\n";

    // 5. Chain everything in a single statement
    int result = 0;
    result += (a * c + b) < (b * 3) && (a == 21 || b == 9);
    cout << "\nresult += (a * c + b) < (b * 3) && (a == 21 || b == 9);\n";
    cout << "Final result = " << result << "\n";
}

/*
-------------------------------------
Step-by-step explanation:
1. a += b * c + 1
   => b * c (10 * 2 = 20)
   => 20 + 1 = 21
   => a = a + 21 = 5 + 21 = 26

2. (a < b + 20) && (b == 10)
   => a = 26, b + 20 = 30 -> true
   => b == 10 -> true
   => true && true -> true (1)

3. (a > 20) || (c < 5)
   => true || true -> true (1)

4. ((a + c * 2) < (b * 3)) && (b == 10 || c == 1)
   => a + c * 2 = 26 + 4 = 30
   => b * 3 = 30
   => 30 < 30 -> false
   => (b == 10 || c == 1) -> (true || false) -> true
   => false && true -> false (0)

5. result += (a * c + b) < (b * 3) && (a == 21 || b == 9)
   => (a * c + b) = 26 * 2 + 10 = 62
   => (b * 3) = 30
   => 62 < 30 -> false
   => (a == 21 || b == 9) -> (false || false) -> false
   => false && false -> false (0)
   => result += 0 -> result = 0
-------------------------------------

Output:
Initial values -> a: 5, b: 10, c: 2
After a += b * c + 1 => a = 26
Condition 1 (a < b + 20 && b == 10): 1
Condition 2 (a > 20 || c < 5): 1
Condition 3 ((a + c * 2) < (b * 3)) && (b == 10 || c == 1): 0
result += (a * c + b) < (b * 3) && (a == 21 || b == 9);
Final result = 0

-------------------------------------
Notes:
- '*' and '+' are evaluated before '<', '==', '&&', '||', and '+='.
- Parentheses '()' can be used to clarify complex logic.
- Logical operators return 1 (true) or 0 (false).
-------------------------------------
*/
