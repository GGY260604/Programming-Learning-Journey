/*
------------------------------------------------------------
                BREAK and CONTINUE (DETAILED)
------------------------------------------------------------
- break exits the loop immediately.
- continue skips the rest of the loop body and moves to the next iteration.
- These can help avoid infinite loops or provide controlled exits,
  but overuse can make loops hard to read.
*/

#include <iostream>
using namespace std;

int main() {
    cout << "Using break to avoid infinite loop:" << endl;
    int i = 1;
    while (true) {                // infinite loop unless broken
        cout << i << " ";
        if (i >= 5) {            // explicit exit condition
            break;               // safely exit
        }
        i++;                     // ensure we move toward the break condition
    }
    cout << endl;

    cout << "Using continue safely:" << endl;
    for (int j = 1; j <= 5; j++) {
        if (j == 3) {
            j++;                // be careful: modifying loop counter here affects behavior
            continue;           // skip printing 3, but we already changed j
        }
        cout << j << " ";
    }
    cout << endl;

    /*
    WARNING:
    - Do NOT forget that modifying the loop counter inside the body (especially with continue)
      may make the loop harder to reason about or accidentally infinite.
    - Prefer keeping simple update expressions in the for(...) clause, and avoid altering
      the loop control variable inside the loop unless necessary and well-documented.
    */
    return 0;
}
