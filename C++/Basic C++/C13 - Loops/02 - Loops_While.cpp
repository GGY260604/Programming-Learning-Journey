/*
------------------------------------------------------------
                 WHILE LOOP (DETAILED)
------------------------------------------------------------
- The while loop checks the condition before running the body.
- You must ensure the loop control (counter or condition) changes
  in a way that eventually makes the condition false.
- If it never becomes false -> infinite loop.

Common causes of infinite loops:
- forgetting to update the counter
- updating the counter in the wrong direction
- condition depends on input that never changes

Always think: "How does this loop end?"
*/

#include <iostream>
using namespace std;

int main() {
    cout << "Correct while example (counts up):" << endl;
    int i = 1;                 // counter starts at 1
    while (i <= 5) {           // target condition: stop when i > 5
        cout << i << " ";
        i++;                   // COUNTER MOVES TOWARD THE CONDITION (increments)
    }
    cout << endl << endl;

    // -----------------------
    // Example of infinite loop (do NOT run in real program)
    // -----------------------
    // int j = 1;
    // while (j <= 5) {
    //     cout << j << " ";
    //     // forgot to change j -> infinite loop
    // }
    //
    // Fix: ensure 'j' is updated inside the loop (j++ or j += 1)

    cout << "Wrong direction example (infinite if not fixed):" << endl;
    int k = 10;
    // Condition expects k to decrease to reach <= 5, but if we increment k it never ends
    // while (k <= 5) {   // false at start; body won't run
    //     k++;
    // }
    //
    // A real wrong-direction example:
    // int m = 1;
    // while (m <= 5) {
    //     cout << m << " ";
    //     m--;            // m goes 1,0,-1,... and never reaches >5 -> infinite loop
    // }

    cout << "Corrected version (counts down to stop condition):" << endl;
    int n = 5;
    while (n > 0) {           // we will decrease n until condition becomes false
        cout << n << " ";
        n--;                  // move counter toward making condition false
    }
    cout << endl;

    return 0;
}

/*
RULES TO AVOID INFINITE WHILE LOOPS:
- Ensure the loop updates variables used in the condition.
- Update them in the correct direction (toward the termination condition).
- If using user input to stop the loop, provide a clear way to change input.
- Consider adding a safety counter or timeout for complex loops.
*/
