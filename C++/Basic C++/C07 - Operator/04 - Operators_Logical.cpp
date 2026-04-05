/*
-------------------------------------
        C++ Operators - Logical
-------------------------------------
Logical operators are used to combine conditions.
They work with boolean values (true or false).
*/

#include <iostream>
using namespace std;

int main() {
    bool x = true;
    bool y = false;

    cout << (x && y) << "  (x && y) AND\n";
    cout << (x || y) << "  (x || y) OR\n";
    cout << (!x)     << "  (!x) NOT\n";
}

/*
Output:
0  (x && y)
1  (x || y)
0  (!x)

Notes:
- && means "AND" => true only if both are true.
- || means "OR"  => true if at least one is true.
- !  means "NOT" => reverses true/false value.
-------------------------------------
*/
