/*
-------------------------------------
    Functions - Recursion
-------------------------------------
A function that calls itself is recursive.
Useful for problems that break into smaller similar problems.

Be careful:
- Ensure a base case to stop recursion
- Deep recursion can overflow the call stack
*/

#include <iostream>
using namespace std;

int factorial(int n) {
    if (n <= 1) return 1;   // base case
    return n * factorial(n - 1);
}

int fibonacci(int n) {
    if (n <= 1) return n;
    return fibonacci(n - 1) + fibonacci(n - 2); // exponential time (inefficient)
}

int main() {
    cout << "5! = " << factorial(5) << endl;    // 120
    cout << "Fib(10) = " << fibonacci(10) << endl; // 55 (but slow)

    // Tip: Use iteration or memoization for large Fibonacci
    return 0;
}

/*
Notes:
- Recursion must have a base case.
- Prefer iteration or DP for performance-sensitive tasks.
- Watch stack depth for large recursion.
*/
