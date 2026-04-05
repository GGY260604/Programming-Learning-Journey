/*
-------------------------------------
    Functions - Default Arguments
-------------------------------------
You can provide default values for parameters.
Callers may omit those arguments.
Defaults are specified in declaration (prototype) or definition,
but typically in the prototype/header file.
*/

#include <iostream>
using namespace std;

// Default values for b and c
int add(int a, int b = 10, int c = 0) {
    return a + b + c;
}

int main() {
    cout << "add(5) = " << add(5) << endl;         // uses b=10, c=0 -> 15
    cout << "add(5, 3) = " << add(5, 3) << endl;   // uses c=0 -> 8
    cout << "add(5, 3, 2) = " << add(5, 3, 2) << endl; // 10

    return 0;
}

/*
Rules:
- Defaults are applied from right to left (you cannot skip middle argument).
- If you provide default in prototype, omit in definition (if separate).
*/
